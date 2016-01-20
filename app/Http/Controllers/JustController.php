<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\UpdateCustomerRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JustController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerRequest|Request $request
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->street = $request->get('street');
        $customer->city_id = $request->get('city_id');
        $customer->phone = $request->get('phone');
        $customer->save();

        $user = User::findOrFail($customer->user->id);
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->save();

        $customer->user()->save($user);

        return redirect('/');
    }
}
