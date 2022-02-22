<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    function loginIndex(){
        return view('admin.login');
    }

    function loginStore(request $request){

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        } else {
            dd('your username and password are wrong.');
        }
        dd("bar");

    }
    function logout(){
        dd("logout");
    }

    function dashboard(){
        return view('admin.dashboard');
    }


    function addManagerIndex(){

        return view('admin.adduser');

    }

    function addManagerStore(request $request){


        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);


        $data = $request->all();

         Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin'  => 1
          ]);
          return redirect()->route("admin.listManagerIndex")->withSuccess('You have signed-in');

        }

    function listManagerIndex(){
        $admins = DB::table('admins')->get();
        return view ('admin.listmanager', ['admins'=>$admins]);
    }


}