<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $session = $request->session();
        $id = $request->get('id');

        //var_dump(array_key_exists('cart', $session->all()));
        $values = [];

        if(array_key_exists('cart', $session->all())) {
            $values = $session->get('cart');
            if(array_key_exists($id, $values)) {
                $values[$id] = $values[$id] + 1;
            }
            else {
                $values = array_merge($values, [$id => 1]);
            }
        }
        $session->put('cart', $values);

        var_dump($session->all());

        //var_dump($session->all());

        /*if(array_key_exists('cart', $session->all())) {
            var_dump('ddasdad');
            $values = $session->get('cart');

            if(array_key_exists($id, $values)) {
                $values[$id] = $values[$id] + 1;
            }
            array_merge($values, [$id => 1]);
            var_dump($values);
        } else {
            $session->put('cart', [$id => 1]);
        }*/

        //dd($session->all());
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
