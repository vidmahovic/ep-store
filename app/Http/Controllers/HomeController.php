<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('customer', ['only' => ['orders']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(['products' => Product::paginate(30)]);
    }

    public function settings()
    {
        if (auth()->user()->hasRole('customer')) {
            return view('user.customer.my-profile')->with('customer', auth()->user()->userable);
        }

        return view('user.edit')->with('user', auth()->user());
    }

    public function orders()
    {

        $orders = Order::by(auth()->user()->userable_id)->orderBy('created_at', 'desc')->get();

        //dd($orders);

        return view('user.activity.orders')->with('orders', $orders);
    }

    public function profile()
    {
        return view('user.profile')->with('user', auth()->user());
    }
}
