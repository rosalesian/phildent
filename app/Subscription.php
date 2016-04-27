<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Subscription extends Model
{
    protected $fillable = [
    		'dental_id',
    		'service_id',
    		'patient_id',
    		'created_at',
    		'updated_at'
    	];

   	static function getSubscriptions()
    {
    	return $subscription = DB::table('subscriptions')
	    					 ->select('subscriptions.id','services.name as service_name','patients.firstname','patients.middlename','patients.lastname','dental_clinics.name as clinic_name','dental_clinics.street', 'dental_clinics.city')
	                         ->leftjoin('patients', 'patients.id', '=', 'subscriptions.patient_id')
	                         ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'subscriptions.dental_id')
	                         ->leftjoin('services', 'services.id', '=', 'subscriptions.service_id')
	                         ->get();
    }
}
