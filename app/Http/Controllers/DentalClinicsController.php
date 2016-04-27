<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DentalClinic;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class DentalClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = DentalClinic::all();
        return view('clinics.index', compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = [];
        $this->validate($request, [
                'name' => 'required',
                'street' => 'required',
                'city' => 'required',
                'municipal' => 'required',
                'barangay' => 'required',
                'phone' => 'required'
            ]);

        $users = [
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admindental'
        ];

        $result_user = User::create($users);



       $clinic = DentalClinic::create([
                'user_id' => $result_user->id,
                'name' => $request->name,
                'street' => $request->street,
                'city' => $request->city,
                'municipality' => $request->municipal,
                'barangay' => $request->barangay,
                'telephone' => $request->phone
            ]);
        $clinics = DentalClinic::all();
        return view('clinics.index', compact('clinics'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clinic = DentalClinic::find($id);
        return view('clinics.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinic = DentalClinic::find($id);
        return view('clinics.edit', compact('clinic'));
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
        $clinic = DentalClinic::find($id);
       // return $clinic;
        //return $clinics;
        $clinic->update($request->all());
        Session::flash('update_flash', 'Successfully Updated!..');
        $clinics = DentalClinic::all();
        return view('clinics.index', compact('clinics'));

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DentalClinic::find($id);
        $user->delete();
        Session::flash('delete', 'Successfully Deleted!...');
        return redirect('dental/clinics');
    }

    public function getAll()
    {
        return DentalClinic::all();
    }
}
