<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Patient extends Model
{
    protected $fillable = [
    		'clinic_id',
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
    		'status',
            'created_at',
            'updated_at'
    	];


    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    static function getPatient($clinic_id)
    {
        return $patient = DB::table('patients')
                        ->select('*')
                        ->where('patients.clinic_id', '=', $clinic_id)
                        ->get();
    }
    static function getPatientById($id)
    {
        return $patient = DB::table('patients')
            ->select('*')
            ->where('patients.id', '=', $id)
            ->get();
    }

    static function getPatientLists($id)
    {
      /*  $list = DB::table('patients'
            DB::raw("(firstname +' '+ lastname) AS full_name, id")
        )->lists('full_name', 'id');*/

        return DB::table('patients')
            ->select('patients.id','patients.firstname') // Add a select so only one column shows up.
            ->where('patients.clinic_id', '=', $id)
            ->lists('firstname', 'id'); // Now list that one column
    }

    static  function addPatient($data, $clinic_id)
    {
        $patient = [];
        //for($i = 0; $i<sizeof($data); $i++)
        //if(array_unique($data))
        //{
            foreach($data as $patients)
       // for($i =0; $i<sizeof($patients); $i++)
            {
                $result = [];
               // $result['id'] = $patients[0]->id;
                $result['clinic_id'] = $clinic_id;
                $result['firstname'] = $patients[0]->firstname;
                $result['middlename'] = $patients[0]->middlename;
                $result['lastname'] = $patients[0]->lastname;
                $result['birthdate'] = $patients[0]->birthdate;
                $result['gender'] = $patients[0]->gender;
                $result['address'] = $patients[0]->address;
                $result['mobile'] = $patients[0]->mobile;
                $result['telephone'] = $patients[0]->telephone;
                $result['gardian_name'] = $patients[0]->gardian_name;
                $result['email'] = $patients[0]->email;
                $result['status'] = 'transfer';
              /*  $result['created_at'] = $patients[0]->created_at;
                $result['update_at'] = $patients[0]->update_at;*/

                $patient[]=$result;
            }
        //}




        return $patient;
    }

    static function array_unique_multidimensional($input)
    {
        $serialized = array_map('serialize', $input);
        $unique = array_unique($serialized);
        return array_intersect_key($input, $unique);
    }




}
