<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use App\DentalClinic;
use App\DentalStaff;
use App\Patient;
use App\Dentist;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        //1st
     /*  User::create([
                'user_name' => 'superadmin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('superadmin'),
                'role' => 'superadmin'
            ]);*/

        //
        $faker = Faker\Factory::create();


        //2nd
       /* foreach(range(1,5) as $index)
        {
            DentalClinic::create([
                'name' => $faker->name,
                'street' => $faker->streetName,
                'city' => $faker->city,
                'municipality' => $faker->address,
                'barangay' => $faker->streetAddress,
                'telephone' => $faker->phoneNumber,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }*/


       /* foreach(range(1,20) as $index)
        {
            DentalStaff::create([
                'user_id' => 1,
                'user_name' => $faker->userName,
                'password' => Hash::make('dentalstaff'),
                'firstname' => $faker->firstName,
                'middlename' => $faker->lastName,
                'lastname' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'number' => $faker->phoneNumber,
                'email' => $faker->email,
                'role' => "staff",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }*/

        //last seed
       /* foreach(range(1,5) as $index)
        {
            Patient::create([
                'clinic_id' => 3,
                'firstname' => $faker->firstName,
                'middlename' => $faker->firstNameMale,
                'lastname' => $faker->lastName,
                'birthdate' => $faker->dayOfMonth,
                'gender' => $faker->randomElement(['male', 'female']),
                'address' => $faker->address,
                'mobile' => $faker->phoneNumber,
                'gardian_name' => $faker->firstNameFemale,
                'email' => $faker->email,
                'status' => "staff",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }*/

        //dentist seed
        foreach(range(1,5) as $index)
        {
            Dentist::create([
                'user_id' => 9,
                'name' => $faker->firstName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        //products
        foreach(range(1,5) as $index)
        {
            Product::create([
                'name' => $faker->firstName,
                'description' => $faker->firstNameFemale,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }







        Model::reguard();

    }
}
