<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use function PHPUnit\Framework\returnArgument;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::where('role_id', User::ROLE_EMPLOYEE)->get();

        return view('employee.index')->with(compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $user = new User();
        $user->role_id = User::ROLE_EMPLOYEE;
        $user->first_name =  $request->first_name;
        $user->last_name =  $request->last_name;
        $user->phone =  $request->phone;
        $user->email =  $request->email;
        $user->password =  Hash::make($request->password);
        $user->address =  $request->address;
        $user->country =  $request->country;
        $user->state =  $request->state;
        $user->city =  $request->city;
        if ($user->save())
           return  redirect(route('employee.index'))->with('message', 'Employee added');
        return redirect(route('employee.index'))->with('error', 'Something went wrong');
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
        $user = User::where('id', $id)->first();
        return view('employee.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $user = User::find($id);
        if (isset($user)){
            if ($user->update($request->all())){
                return redirect(route('employee.index'))->with('message', 'Employee updated');
            }
        }
        return redirect(route('employee.index'))->with('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (isset($user) && $user->delete()){
            return redirect(route('employee.index'))->with('message', 'Employee deleted');
        }
        return redirect(route('employee.index'))->with('error', 'Something went wrong');
    }


    public function changePassword($id)
    {
        $user = User::where('id', $id)->first();
        if (isset($user)){
            return view('employee.change-password')->with(compact('user'));
        }
        return redirect(route('employee.index'))->with('error', 'User not found!');

    }

    public function updatePassword(Request $request)
    {
        $user = User::find($request->id);
        if (isset($user)){
            $user->password = Hash::make($request->passwrod);
            if ($user->save()){
                return redirect(route('employee.index'))->with('message', 'Employee updated');
            }
        }
        return redirect(route('employee.index'))->with('error', 'Something went wrong');
    }
}
