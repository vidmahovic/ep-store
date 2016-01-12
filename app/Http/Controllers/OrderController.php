<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderState;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
        $this->middleware('customer', ['only' => ['show', 'store']]);
        $this->middleware('employee', ['only' => ['index', 'update']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @param null $status
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        if($status) {

            $state_id = OrderState::where('name', $status)->first()->id;

            return view('orders')->with([

                'orders' => Order::where('state_id', $state_id)->orderBy('created_at', 'desc')->get()

            ]);
        }

        return view('user.orders')->with('orders', Order::orderBy('created_at', 'desc'));
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
        $customer = auth()->user();

        $order = Order::create([
            'ordered_by' =>  $customer->id,
            'state_id' => OrderState::where('name', 'pending')->first()->id,
        ]);

        foreach($cart as $product_id => $quantity) {

            $order->products()->attach($product_id, ['quantity' => $quantity]);

        }

        $request->session()->forget('cart');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $state_id = OrderState::where('name', $request->get('status'))->first()->id;

        if(! is_null($state_id)) {

            $order = Order::findOrFail($id);
            $order->update([
                'state_id' => $state_id
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
