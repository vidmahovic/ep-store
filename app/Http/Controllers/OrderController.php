<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\OrderWasPurchased;
use App\Order;
use App\OrderState;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
        $this->middleware('customer', ['only' => ['show', 'store']]);
        $this->middleware('employee', ['only' => ['index', 'update']]);
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = new Order;

        return view('user.orders')->with('orders', $orders);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmed()
    {
        return view('user.orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = $request->session()->get('cart');
        $customer = Customer::findOrFail(auth()->user()->userable_id);
        $order_price = 0;


        $order = Order::create([
            'ordered_by' =>  $customer->id,
            'state_id' => OrderState::where('name', 'pending')->first()->id,
        ]);

        foreach($cart as $product_id => $quantity) {

            $order->products()->attach($product_id, ['quantity' => $quantity]);

            $product = Product::findOrFail($product_id);
            $product->stock -= $quantity;
            $product->save();

            $order_price += $quantity * $product->price;
        }

        $order->price = $order_price;
        $order->shipping = rand(100, 10000) /100;
        $order->save();

        $request->session()->forget('cart');

        event(new OrderWasPurchased($order));

        return redirect('customer/purchase/success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage. Useful for confirming an order. So if an employee confirms an order, you should call this function.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $order = Order::findOrFail($id);

        $order->update([
            'state_id' => $request->get('state_id'),
            'acquired_by' => Auth::user()->userable->id,
        ]);

        return redirect('/');
    }


    /**
     * Call: PUT (/orders/{orders}/deactivate)
     *
     * Deactivate an order. This will serve for: declining an order (before it's been processed) and cancelling it (after it's been processed)
     * In bothe cases, we call delete() method on a model, which soft-deletes a record (sets the deleted_at timestamp). So if an employee does
     * one of above mentioned actions, you should call this function.
     * @param $id
     */
    public function deactivate($id)
    {
        $order = Order::find($id);
        $state = $order->state()->first();


        if($state->name == 'pending') {
            $order->state_id = OrderState::where('name', 'declined')->first()->id;
            $order->acquired_by = auth()->user()->userable_id;
            $order->save();
            $order->delete();
            return redirect('/')->with('message', 'Uspešen preklic naročila.');
        }
        else {
            $order->state_id = OrderState::where('name', 'cancelled')->first()->id;
            $order->save();
            $order->delete();
            return redirect('/')->with('message', 'Uspešen storno naročila.');
        }

    }
}
