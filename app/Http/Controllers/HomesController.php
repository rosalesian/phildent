<?php

namespace App\Http\Controllers;

use App\Anouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DentalClinic;
use App\Service;
use App\Subscription;
use App\Patient;
use App\Dentist;
use App\Product;
use App\NewSubscription;

class HomesController extends Controller
{
    private $_email;
    private $_firstname;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic_id = DentalClinic::getClinicId(Auth::user()->id);
        $clinic = DentalClinic::find($clinic_id[0]->id);
        $clinic_name = $clinic->name;
        $anouncement = Anouncement::all();

       $dentists = Dentist::lists('name', 'id');
        $products = Product::lists('name', 'id');
        $patients = Patient::lists('firstname', 'id');
        $clinics = DentalClinic::lists('name', 'id');
        $services = Service::lists('name', 'id');
        return view('public.homes.index', compact('clinics', 'services', 'dentists', 'products', 'patients', 'anouncement', 'clinic_name'));
       // return $clinics;

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
        $data = $request->all();

        $patient_id = $request->get('patient_id');

       $patient_data = Patient::getPatientById($patient_id);
       $this->_email=$patient_data[0]->email;
        $this->_firstname=$patient_data[0]->firstname;
        //return   $this->_email;
      $result = NewSubscription::create($data);

        //send notification

        Mail::send('public.emails.reminder', ['name' => $this->_firstname], function ($message) {
            //$message->from('hello@app.com', 'Your Application');

            //$message->to('iurosales.pgkhc@gmail.com', 'Some Guy')->from('otheremail@some.com')->subject('Your Reminder!');
            $message->to($this->_email, 'Some Guy')->from('otheremail@some.com')->subject('Your Reminder!');
        });

        $dentists = Dentist::lists('name', 'id');
        $products = Product::lists('name', 'id');
        $patients = Patient::lists('firstname', 'id');
        $clinics = DentalClinic::lists('name', 'id');
        $services = Service::lists('name', 'id');
        return view('public.homes.index', compact('clinics', 'services', 'dentists', 'products', 'patients'));

/*
        //add patient
        $patient = Patient::create($data);

        //add subscription
        $subscription = [
                'dental_id' => $dental_id,
                'service_id' => $service_id,
                'patient_id' => $patient->id
            ];

        $result = Subscription::create($subscription);

        //send notification

          Mail::send('public.emails.reminder', ['name' => $this->_firstname], function ($message) {
            //$message->from('hello@app.com', 'Your Application');

            //$message->to('iurosales.pgkhc@gmail.com', 'Some Guy')->from('otheremail@some.com')->subject('Your Reminder!');
            $message->to($this->_email, 'Some Guy')->from('otheremail@some.com')->subject('Your Reminder!');
        });


        $clinics = DentalClinic::lists('name', 'id');
        $services = Service::lists('name', 'id');
        return view('public.homes.index', compact('clinics', 'services'));
*/

        

        /* Mail::send('public.emails.reminder', ['name' => 'test'], function ($message) {
            //$message->from('hello@app.com', 'Your Application');

            $message->to('iurosales.pgkhc@gmail.com', 'Some Guy')->from('otheremail@some.com')->subject('Your Reminder!');
        });*/

        // return $patient;
        // return "Hello World";
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
}
    