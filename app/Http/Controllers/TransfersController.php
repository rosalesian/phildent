<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DentalClinic;
use App\Transfer;
use Illuminate\Support\Facades\Input;
use Session;

class TransfersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicsFrom = DentalClinic::lists('name', 'id');
        $clinicsTo = DentalClinic::lists('name', 'id');
        return View('transfers.index', compact('clinicsFrom', 'clinicsTo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::getPatient(1);
        //return $patients;

       return view('transfers.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return $request->all();
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
        //
    }

    public function returnView()
    {
        return "Hello World";
    }

    public function transfer()
    {

        $clinicsFrom = DentalClinic::lists('name', 'id');
        $clinicsTo = DentalClinic::lists('name', 'id');
        return View('transfers.index', compact('clinicsFrom', 'clinicsTo'));

    }

    public function transferAdd()
    {
        //$patients = Patient::getPatient($request->clinicsFrom);

        //return returnView();

        //return Request::all();
       // $patients = Patient::getPatient(1);
        //return $patients;

        $data =  Input::get('clinicsFrom');
        //$patients = Patient::getPatientLists($data);
        $patients = Patient::getPatient($data);
        $clinic_name = DentalClinic::getClinicName($data);

        $clinics = DentalClinic::lists('name', 'id');
        $name = $clinic_name[0]->name;

        return view('transfers.create', compact('patients', 'name', 'clinics'));



    }

    public function transferAddAll()
    {
        $patient = [];
        $result = [];
        $patient_r = [];
        /* $data =  Input::all();
        return dd($data);*/

        $friends_checked = Input::get('patients');
        if(is_array($friends_checked))
        {
            // do stuff with checked friends
            for($i=0; $i< sizeof($friends_checked); $i++)
            {
                $result_array['id'] = $friends_checked[$i];
                $result[]=$result_array;

            }
        }
        //$result = Patient::getPatientById($data[0]);
        for($i=0; $i< sizeof($result); $i++)
        {
            $patient_result = Patient::getPatientById($result[$i]);
            $patient[]=$patient_result;
        }
        $clinicsTo = Input::get('clinicsTo');

        for($i=0; $i< sizeof($patient); $i++)
        {
            $data_result_patient = Patient::addPatient($patient, $clinicsTo);
            $patient_r[]=$data_result_patient;
        }


       $ss = Patient::array_unique_multidimensional($patient_r);

        Session::flash('delete', 'Successfully Transfer!...');
        $add_reslult = Patient::insert($ss[0]);
        $clinicsFrom = DentalClinic::lists('name', 'id');
        $clinicsTo = DentalClinic::lists('name', 'id');
        return View('transfers.index', compact('clinicsFrom', 'clinicsTo'));
    }


}
