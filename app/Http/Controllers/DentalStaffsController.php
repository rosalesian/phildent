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
use Response;

class DentalStaffsController extends Controller
{

   /* private $user_id;

    public function __construct() {
        $this->user_id = Auth::user()->id;
    }*/
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
       //$user_id = Auth::user()->id;

       //$u = $request->all();
       $user = [
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff'
        ];

        $result = User::create($user);

        $staff = [
            'user_id' => $result->id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'number' => $request->mobile
        ];

        $staff_result = DentalStaff::create($staff);

        $staffs = DentalStaff::all();
        return view('staffs.index', compact('staffs'));

/*
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

        $staffs = DentalStaff::all();
        return view('staffs.index', compact('staffs'));*/
      
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
       //return $staff;
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
       /* $this->validate($request, [
            'user_name' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'user_name' => $request->user_name,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'number' => $request->mobile,
            'email' => $request->email,
            'role' => $request->role
        ];*/

        $staff = DentalStaff::find($id);
        //return $staff;
        $staff->update($request->all());

        Session::flash('update_flash', 'Successfully Updated!..');
        $staffs = DentalStaff::all();
        return view('staffs.index', compact('staffs'));
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
