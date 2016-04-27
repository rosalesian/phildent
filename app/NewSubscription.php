<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class NewSubscription extends Model
{
    protected $fillable = [
    		'clinic_id',
    		'appointment_id',
    		'dentist_id',
    		'product_id',
    		'patient_id',
    		'date'
    	];


    static function getNewSubcription()
    {
    	 return DB::table('new_subscriptions')
             ->select('new_subscriptions.id', 'dental_clinics.name as clinic_name', 'dentists.name as dentist_name', 'patients.firstname as patient_name', 'products.name as product_name')
              ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'new_subscriptions.clinic_id')
              
              ->leftjoin('dentists', 'dentists.id', '=', 'new_subscriptions.dentist_id')
              ->leftjoin('patients', 'patients.id', '=', 'new_subscriptions.patient_id')
              ->leftjoin('products', 'products.id', '=', 'new_subscriptions.product_id')
             //->select('transfers.id','transfers.clinic_to as clinic_to','transfers.clinic_from as clinic_from')
              
             ->get();
    }
}
