<?php

use Psy\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Sahil Jani',
            'email' => 'sahiljani123456@gmail.com',
            'password' => Hash::make('Sahil@41212'),
            'role'     => 0

        ]);
    }
}
