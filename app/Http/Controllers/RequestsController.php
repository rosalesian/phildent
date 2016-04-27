<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transfer;
use App\Patient;
use App\DentalClinic;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $transfers = Transfer::getTransferFrom();
        $transfersTo = Transfer::getTransferTo();
        return  View('requests.index', compact('transfers', 'transfersTo'));
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
        //
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
        $data = [];
        $request = Transfer::find($id);
        //update transfer
        //$result = Transfer::updateTransfers($id);
        $patients = Patient:: getPatient($request->clinic_from);

        return $patients;
       // return $request->clinic_from;

       // $resullt_person = Patient::insert($patients);

       // return $resullt_person;
        /*for(var i = 0; i<sizeof($patients); i++)
        {
            $data['clinic_id'] = $patients->
        }*/
       /* foreach($patients as $patient)
        {
            $data['clinic_id'] = $patient->clinic_id;
            $data['firstname'] = $patient->firstname;
            $data['middlename'] = $patient->middlename;
            $data['lastname'] = $patient->lastname;
            $data['birthdate'] = $patient->birthdate;
            $data['gender'] = $patient->gender;
            $data['address'] = $patient->address;
            $data['mobile'] = $patient->mobile;
            $data['gardian_name'] = $patient->gardian_name;
            $data['email'] = $patient->email;
            $data['status'] = $patient->status;
        }
        return $data;*/

    }
}
