<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patient;
use App\DentalClinic;
use Hash;
use Session;
use Auth;
use DB;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $user_id = Auth::user()->id;
       // $clinic_id = DentalClinic::getClinicId($user_id[0]);
        $patients = DB::table('patients')
                    ->select('patients.id','dental_clinics.name','patients.firstname','patients.middlename', 'patients.lastname', 'patients.birthdate', 'patients.gender', 'patients.address', 'patients.mobile', 'patients.telephone', 'patients.gardian_name', 'patients.email', 'patients.status', 'patients.created_at', 'patients.updated_at')
                    ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'patients.clinic_id')
                   // ->where('patients.clinic_id', '=', $clinic_id[0]->id)
                    ->get();
        //return $patients;
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $clinics = DentalClinic::lists('name', 'id');
       return view('patients.create', compact('clinics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $clinic_id = DentalClinic::getClinicId($user_id[0]);
         $this->validate($request, [
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'birthdate' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'mobile' => 'required',
                'telephone' => 'required',
                'gardian_name' => 'required',
                'email' => 'required'
            ]);

        $patient = [
                'clinic_id' => $clinic_id[0]->id,
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
                'status' => 'Active'
            ];

        $final = Patient::create($patient);

        //return $patient;
        Session::flash('update_flash', 'Successfully Added!..');
         // $clinic_id = Auth::user()->id;
        $patients = DB::table('patients')
                    ->select('patients.id','dental_clinics.name','patients.firstname','patients.middlename', 'patients.lastname', 'patients.birthdate', 'patients.gender', 'patients.address', 'patients.mobile', 'patients.telephone', 'patients.gardian_name', 'patients.email', 'patients.status', 'patients.created_at', 'patients.updated_at')
                    ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'patients.clinic_id')
                    ->where('patients.clinic_id', '=', $clinic_id[0]->id)
                    ->get();
      
        return view('patients.index', compact('patients'));

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
        $clinics = DentalClinic::lists('name', 'id');
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient', 'clinics'));
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
        /*  $this->validate($request, [
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
            */

        $data =  [
                'clinic_id' => $request->clinics,
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
            ];
        $patien = Patient::find($id);
        $patien->update($data);
        Session::flash('update_flash', 'Successfully Updated!..');
         /* $clinic_id = Auth::user()->id;*/
        $patients = DB::table('patients')
                    ->select('patients.id','dental_clinics.name','patients.firstname','patients.middlename', 'patients.lastname', 'patients.birthdate', 'patients.gender', 'patients.address', 'patients.mobile', 'patients.telephone', 'patients.gardian_name', 'patients.email', 'patients.status', 'patients.created_at', 'patients.updated_at')
                    ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'patients.clinic_id')
                    //->where('patients.clinic_id', '=', $clinic_id)
                    ->get();
      
        return view('patients.index', compact('patients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Patient::find($id);
        $user->delete();
        Session::flash('delete', 'Successfully Deleted!...');
        return redirect('dental/patients');
    }

    public function getAll()
    {
        return Patient::all();
    }

    public function apiAdd()
    {
        $response = [];
        //$data = Response::all();
        $response = [
            'status_code' => 200,
            'error' => false,
            'data' =>'Hello World'
        ];

        return Response::json($response);

    }

    public function addInfo()
    {
        return Request::all();
    }
}
