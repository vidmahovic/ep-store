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
        $this->middleware('auth');
        $this->middleware('employee', ['except' => 'show']);
    }


    /**
     * Display a listing of the resource.
     * HTTP method: GET
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('employee')) {
            $products = Product::withTrashed()->all();
        } else {
            $products = Product::all();
        }
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
        return view('user.product.create');
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
        Product::create([
            'name' => $request->get('name'),
            'serial_num' => $request->get('serial_num'),
            'price' => $request->get('price'),
            'manufacturer' => $request->get('manufacturer'),
            'stock' => $request->get('stock'),
            'image_path' => $request->get('image_path')
        ]);

        return redirect('/')->with('message', 'Artikel je bil uspešno dodan.');
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
    public function edit(Product $product)
    {

        return view('user.product.edit')->with('product', $product);
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

    public function deactivate(Product $product) {

        $product->delete();

        //return redirect('/')->with('message', 'Izdelek uspešno deaktiviran.');
    }


    public function activate($id) {

        $product = Product::withTrashed()->find($id);

        $product->restore();

        //return redirect('/')->with('message', 'Izdelek uspešno aktiviran.');
    }

}
