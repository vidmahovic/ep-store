<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('employee');
    }


    /**
     * Display a listing of the resource.
     * HTTP method: GET
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('list_products')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     * HTTP method: GET
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     * HTTP method: POST
     *
     * @param StoreProductRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

    }

    /**
     * Display the specified resource.
     * HTTP method: GET
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Product $product)
    {
        return view('user.product.details')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     * HTTP method: GET
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
     * HTTP method: PUT/PATCH
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * HTTP method: DELETE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
