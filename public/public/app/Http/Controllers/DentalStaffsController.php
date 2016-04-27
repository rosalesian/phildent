<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DentalStaff;
use App\User;
use Hash;
use Session;
use Auth;

class DentalStaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = DentalStaff::all();
        return view('staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //$user_id = User::Auth()->id;
       $user_id = 1;

        $this->validate($request, [
                'user_name' => 'required',
                'password' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'phone' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'role' => 'required'
            ]);
       $staffs = DentalStaff::create([
                'user_id' => $user_id,
                'user_name' => $request->user_name,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'number' => $request->mobile,
                'email' => $request->email,
                'role' => $request->role
            ]);
        return redirect('dental/staffs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = DentalStaff::find($id);
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = DentalStaff::find($id);
        return view('staffs.edit', compact('staff'));
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
        $staff = $request->all();
        return $staff;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = DentalStaff::find($id);
        $staff->delete();
        Session::flash('delete', 'Successfully Deleted!...');
        return redirect('dental/staffs');
    }
}
