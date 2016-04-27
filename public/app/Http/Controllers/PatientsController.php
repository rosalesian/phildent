<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patient;
use Hash;
use Session;
use Auth;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'user_name' => 'required|min:3',
                'password' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'birthdate' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'mobile' => 'required',
                'telephone' => 'required',
                'gardian_name' => 'required',
                'email' => 'required',
                'status' => 'required'
            ]);

        $patient = Patient::create([
                'user_id' => Auth::user()->id,
                'user_name' => $request->user_name,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'birthdate' => $request->birthdate,
                'gender' => $request->gender,
                'address' => $request->address,
                'mobile' => $request->mobile,
                'telephone' => $request->telephone,
                'gardian_name' => $request->gardian_name,
                'email' => $request->email,
                'status' => $request->status
            ]);
        return redirect('dental/patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
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
         $this->validate($request, [
                'user_name' => 'required|min:3',
                'password' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'birthdate' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'mobile' => 'required',
                'telephone' => 'required',
                'gardian_name' => 'required',
                'email' => 'required',
                'status' => 'required'
            ]);

        $patient = Patient::update($id, [
                'user_id' => Auth::user()->id,
                'user_name' => $request->user_name,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'birthdate' => $request->birthdate,
                'gender' => $request->gender,
                'address' => $request->address,
                'mobile' => $request->mobile,
                'telephone' => $request->telephone,
                'gardian_name' => $request->gardian_name,
                'email' => $request->email,
                'status' => $request->status
            ]);
        return redirect('dental/patients');
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
