<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderState;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    protected $collection;

    public function __construct(Collection $collection) {
        $this->collection = $collection;

        $this->middleware('customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('cart')) {

            $quantities = [];
            $total = 0.0;

            foreach(session('cart') as $key => $val) {

                $total += floatval(Product::find($key)->price) * floatval($val);
                $this->collection->push(Product::find($key));
                $quantities[$key] = $val;
            }

            return view('user.purchase')->with([
                'products' => $this->collection,
                'quantities' => $quantities,
                'total' => $total
            ]);
        }
    }

    /**
     * Make order
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Put products and their quantities to session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param $products
     */
    public function store(Request $request)
    {
        $session = $request->session();
        $session->put('cart', $request->get('products'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return view('user.purchase-success');
    }
}
