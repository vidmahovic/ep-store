<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * HTTP method: GET
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return User::all();
    }

    /**
     * Show the form for creating a new resource.
     * HTTP method: GET
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * HTTP method: POST
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);

        if($user->hasRole('customer')) {
            return view('user.customer.edit')->with(['customer' => $user->userable()->first()]);
        }

        return view('user.edit')->with(['user' => $user->userable()->first()]);
    }

    /**
     * Update the specified resource in storage.
     * HTTP method: PUT/PATCH
     *
     * @param UpdateUserRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->get('id'));

        $user->update($request->except('id'));

        return redirect('user')->with('message', 'Uspešno ste posodobili svoje podatke.');
    }
}
