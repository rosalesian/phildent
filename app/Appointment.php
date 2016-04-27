<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'service_id',
        'patient_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function services()
    {
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function patients()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }
}
