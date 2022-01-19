<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::Create([
        'name' => 'Sahil Jani',
        'email' => 'doejohn@gmail.com',
        'isAdmin' => 1,
        'password' => Hash::make('Sahil@41212'),
        'email_verified_at' => '2020-12-01',
        'created_at' => '2020-12-11',
        'updated_at' => '2020-12-11',

        ]);
    }
}