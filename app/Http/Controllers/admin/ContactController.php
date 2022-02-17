<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //

    // function moveleads($id){
    //     $data = DB::table('contacts')
    //     ->join('users', 'contacts.user_id', '=', 'users.id')
    //     ->where('user_id', $id)
    //     ->get();
    // dd($data);
    // }
    function moveleads($id){
        $datas = DB::table('users')
        ->where('id', $id)
        ->get();

        $presses = DB::table('filters')
        ->where('type', '=', "1")
        ->get();


        $plates  = DB::table('filters')
        ->where('type', '=', "2")
        ->get();
        return view('admin.moveleads', compact('datas', 'presses','plates'));


    }

}
