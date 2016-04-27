<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transfer extends Model
{
    protected $fillable = [
    		'clinic_to',
    		'clinic_from',
    		'status'
    	];

    static function getTransferFrom()
    {
        return DB::table('transfers')
             ->select('transfers.id','transfers.clinic_to','transfers.clinic_from','transfers.status','dental_clinics.name','dental_clinics.street', 'dental_clinics.city', 'dental_clinics.barangay')
              ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'transfers.clinic_from')
             //->select('transfers.id','transfers.clinic_to as clinic_to','transfers.clinic_from as clinic_from')
              ->where('transfers.status', '=', 'pending')
             ->get();
    }

    static function getTransferTo()
    {
         return DB::table('transfers')
             ->select('transfers.id','transfers.clinic_to','transfers.clinic_from','transfers.status','dental_clinics.name','dental_clinics.street', 'dental_clinics.city', 'dental_clinics.barangay')
              ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'transfers.clinic_to')
             //->select('transfers.id','transfers.clinic_to as clinic_to','transfers.clinic_from as clinic_from')
               ->where('transfers.status', '=', 'pending')
             ->get();
    }

    static function updateTransfers($id)
    {
        return DB::table('transfers')
                ->where('id', $id)
                ->update(['status' => 'approved']);
    }
}
