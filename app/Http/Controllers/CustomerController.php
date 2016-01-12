<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\HttpCache\Store;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('employee', ['except' => ['show', 'edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('user')->paginate(30);

        return $customers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Create view for storing a customer';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $user = Customer::create([
            'phone' => $request->get('phone'),
            'street' => $request->get('street'),
            'city_id' => $request->get('city_id')
        ]);

        $customer = User::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        $customer->user()->save($user);

        return redirect('/user')->with('customers', 'Stranka '.$user->name.' '.$user->surname.' je bila uspešno ustvarjena.');
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        dd($customer);
        return $customer->with('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return $customer->with('user');
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

    public function deactivate($id) {

    }

    public function activate($id) {

    }
}
