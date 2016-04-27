<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
    		'user_id',
    		'user_name',
    		'password',
    		'firstname',
    		'middlename',
    		'lastname',
    		'birthdate',
    		'gender',
    		'address',
    		'mobile',
    		'telephone',
    		'gardian_name',
    		'email',
    		'status'
    	];
}
