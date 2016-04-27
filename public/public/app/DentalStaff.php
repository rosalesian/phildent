<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DentalStaff extends Model
{
    protected $fillable = [
            'user_id',
    		'user_name',
    		'password',
    		'firstname',
    		'middlename',
    		'lastname',
    		'phone',
    		'number',
    		'email',
    		'role'
    	];
}
