<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DentalDetail extends Model
{
    protected $fillable = [
        'clinic_id',
        'staff_id',
        'created_at',
        'updated_at'
    ];

    public function clinics()
    {
        return $this->belongsTo('App\DentalClinic','clinic_id');
    }

    public function staffs()
    {
        return $this->belongsTo('App\DentalStaff', 'staff_id');
    }

    public function services()
    {
        return $this->hasMany('App\Services');
    }
}
