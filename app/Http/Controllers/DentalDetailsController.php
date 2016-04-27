<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DentalClinic;
use App\DentalDetail;
use App\DentalStaff;
use Session;





class DentalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = DentalDetail::with('clinics','staffs')->get();
        return view('details.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinics = DentalClinic::lists('name', 'id');
        $staffs = DentalStaff::lists('firstname', 'id');
        return view('details.create', compact('clinics', 'staffs'));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DentalDetail::create($request->all());
        $details = DentalDetail::with('clinics','staffs')->get();
        return view('details.index', compact('details'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $clinic = DentalDetail::with('clinics', 'staffs')->find($id);
        return view('details.show', compact('clinic'));
        //return $details;

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
        $staffs = DentalStaff::lists('firstname', 'id');
        $detail = DentalDetail::find($id);
        return view('details.edit', compact('detail','clinics', 'staffs'));


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
        $details = DentalDetail::find($id);
        $details->update($request->all());
        Session::flash('update_flash', 'Successfully Updated!..');
        $details = DentalDetail::with('clinics','staffs')->get();
        return view('details.index', compact('details'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DentalDetail::find($id);
        $user->delete();
        Session::flash('delete', 'Successfully Deleted!...');
        $details = DentalDetail::with('clinics','staffs')->get();
        return view('details.index', compact('details'));
    }
}
