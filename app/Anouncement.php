<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anouncement extends Model
{
    protected $fillable = [
    		'user_id',
    		'name',
    		'descriptions'
    	];
}
