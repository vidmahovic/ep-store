<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\UpdateEmployeeRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('admin');
        //$this->middleware('employee');
        //$this->middleware('employee', ['only' => ['edit', 'update', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::withTrashed()->paginate(30);

        return view('user.employee.index')->with('employees', $employees);
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
     * @param Employee $employee
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Employee $employee)
    {
        return view('user.profile')->with('user', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('user.employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = User::findOrFail($request->get('id'));

        $employee->update($request->except('id'));

        return redirect('/user')->with('message', 'Uspešno ste posodobili prodajalca.');
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

    public function deactivate(Employee $employee)
    {
        $employee->delete();
        $employee->user->delete();

        return redirect()->back();
    }

    public function activate($id) {

        $employee = Employee::withTrashed()->where('id', $id)->first();
        $user = User::withTrashed()->where('userable_id', $id)->first();

        $employee->restore();
        $user->restore();

        return redirect()->back();
    }
}
