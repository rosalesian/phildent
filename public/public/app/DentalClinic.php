<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DentalClinic extends Model
{
    protected $fillable = [
    		'name',
    		'street',
    		'city',
    		'municipality',
    		'barangay',
    		'telephone', 
    	];
}
