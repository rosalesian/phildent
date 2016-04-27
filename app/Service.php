<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Service extends Model
{
    protected $fillable = [
        'detail_id',
        'name',
        'status',
        'created_at',
        'updated_at'
    ];

    public function details()
    {
        return $this->belongsTo('App\DentalDetail', 'detail_id');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    static function getDentalDetails()
    {
        return $details = DB::table('dental_details')
                        ->select('dental_details.id as id', 'dental_clinics.name as name')
                        ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'dental_details.clinic_id')
                        ->lists("name", "id");

        /*
        notes:
         $friends = Friends::whereUserId($user->id)->with(array("user" => function($query) {
            $query->select(DB::raw('concat (users.first_name," ",users.last_name) as full_name, users.id'));
        }))->lists("full_name", "friend_id");
        */
    }

    static function getServices()
    {
        return $services = DB::table('services')
                         ->select('services.id','services.name as service_name','dental_clinics.name as clinic_name', 'dental_clinics.street', 'dental_clinics.city')
                         ->leftjoin('dental_details', 'dental_details.id', '=', 'services.detail_id')
                         ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'dental_details.clinic_id')
                         ->get();
    }

    static function getServicesInfo($id)
    {
        return $services = DB::table('services')
                         ->select('services.id','services.name as service_name','dental_clinics.name as clinic_name', 'dental_clinics.street', 'dental_clinics.city')
                         ->leftjoin('dental_details', 'dental_details.id', '=', 'services.detail_id')
                         ->leftjoin('dental_clinics', 'dental_clinics.id', '=', 'dental_details.clinic_id')
                         ->where('services.id', '=', $id)
                         ->get();
    }
}
