<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Municipality;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\HttpCache\Store;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('employee');
        //$this->middleware('customer', ['only' => ['show', 'edit', 'update']]);
        //$this->middleware('employee');
    }

    public function getRememberToken() {
        parent::getRememberToken();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::withTrashed()->paginate(30);

        return view('user.customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerRequest|Request $request
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
        return view('user.customer.profile')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('user.customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $customer)
    {
        $customer->street = $request->get('street');
        $customer->city_id = $request->get('city_id');
        $customer->phone = $request->get('phone');
        $customer->save();

        $user = User::where('userable_id', $customer->id)->firstOrFail();
        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->save();

        $customer->user()->save($user);

        return redirect('/')->with('message', 'Podatki so bili uspešno posodobljeni.');

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

    public function deactivate(Customer $customer) {

        $customer->delete();
        $customer->user->delete();
        return redirect()->back();
    }

    public function activate($id) {

        $customer = Customer::withTrashed()->find($id);
        $user = User::withTrashed()->where('userable_id', $customer->id)->first();

        $customer->restore();
        $user->restore();
        return redirect()->back();
    }
}
