<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use DB;

class Dentist extends Model
{
    protected $fillable = [
    		'user_id',
    		'name',
    		'created_at',
    		'updated_at'
    	];

    static function getDentists()
    {
    	 return DB::table('dentists')
             ->select('dentists.id','dentists.name','users.user_name','users.email')
              ->leftjoin('users', 'users.id', '=', 'dentists.user_id')
             ->get();
    }
}
