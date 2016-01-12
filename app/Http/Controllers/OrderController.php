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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc');

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
        $customer = auth()->user();

        $order = Order::create([
            'ordered_by' =>  $customer->id,
            'state_id' => OrderState::where('name', 'pending')->first()->id,
        ]);

        foreach($cart as $product_id => $quantity) {

            $order->products()->attach($product_id, ['quantity' => $quantity]);

        }

        $request->session()->forget('cart');

        return true;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
