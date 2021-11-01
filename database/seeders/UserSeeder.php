<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Sentinel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$credentials = [
                'first_name'  => 'Admin',
                'last_name'   => 'admin',
                'email'       => 'admin@gmail.com',
                'password'    => '12345'
        ];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $role->users()->attach($user);
   }
}
