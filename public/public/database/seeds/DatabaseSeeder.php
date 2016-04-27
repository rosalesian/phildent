<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

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
        User::create([
                'user_name' => 'superadmin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('superadmin'),
                'role' => 'superadmin'
            ]);

        Model::reguard();
    }
}
