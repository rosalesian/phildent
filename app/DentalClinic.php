<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class DentalClinic extends Model
{
    protected $fillable = [
    		'name',
    		'street',
    		'city',
    		'municipality',
    		'barangay',
    		'telephone',
            'created_at',
            'updated_at'
    	];

    public function details()
    {
        return $this->hasMany('App\DentalDetail','name');
    }

    public function staffs()
    {
        return $this->hasMany('App\DentalStaff', 'name');
    }

    static function getClinicName($id)
    {
        return DB::table('dental_clinics')
                ->select('name')
                ->where('dental_clinics.id', '=', $id)
                ->get();
    }

    static function getClinicId($id)
    {
        return DB::table('dental_clinics')
            ->select('dental_clinics.id')
            ->where('dental_clinics.user_id', '=', $id)
            ->get();
    }


}
