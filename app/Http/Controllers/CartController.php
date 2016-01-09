<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{

    protected $collection;

    public function __construct(Collection $collection) {
        $this->collection = $collection;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantities = [];

        if(session('cart')) {
            foreach(session('cart') as $key => $val) {
                $this->collection->push(Product::find($key));
                $quantities[$key] = $val;
            }
        }
        return view('user.cart')->with([
            'products' => $this->collection,
            'quantities' => $quantities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request)
    {
        $session = $request->session();
        if(! array_key_exists('cart', $session->all())) {
            $session->put('cart');
        }

        $id = (string) $request->get('id');
        $values = [];

        if(! is_null($session->get('cart'))) {
            $values = $session->get('cart');
        }

        if(! array_key_exists($id, $values)) {
            $values = $values + [$id => 1];
            $session->put('cart', $values);
        }

        var_dump($session->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request)
    {
        $session = $request->session();
        $id = (string) $request->get('id');

        var_dump($session->get('cart'));

        $request->session()->forget('cart.'.$id);

        //var_dump($session->get('cart'));
    }
}