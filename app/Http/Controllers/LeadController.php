<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LeadController extends Controller
{
    //
    public function addLeadIndex(){

        return view('admin.addlead');
    }




    public function addLeadStore(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'notes' => $request->notes,
            'password' => Hash::make($request->password)
          ]);

        return redirect()->back()->with('success', 'Lead Added');
    }

    public function listLeadIndex(){

        $users = DB::table('users')->get();
        return view ('admin.listlead', ['users'=>$users]);
    }


    public function getupdatelead($id, request $request){

        $leads = DB::table('users')->where('id', $id)->get();
        return view('admin.updatelead', compact('leads'));
    }

    public function updatelead(request $request){

        User::where('id', $request->id)
      ->update([

        'name' => $request->name,
        'email' => $request->email,
        'notes' => $request->notes,
      ]);

      return redirect()->route('admin.listLeadIndex')->with('success', 'Updated');
    }
}