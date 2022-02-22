<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Filter;
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


    function addCounter(request $request){
    User::where('id', $request->id)
        ->update([
          'counter' => $request->counter,
        ]);
        return response()->json(['success'=>'Counter Updated']);
    }


    function addfilter(){
        $filters = DB::table('filters')->get();

        return view('admin.addmaintenance', compact("filters"));

    }

    function addfilterPOST(request $request){

        $request->validate([
            'name' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required',
            ]);

            $imageName = time().'.'.$request->img->extension();


            $request->img->move(public_path('assets/images'), $imageName);

         Filter::create([
            'name' => $request->name,
            'img' => $imageName,
            'type' => $request->type
          ]);
          return redirect()->back()->with('success', 'Filter Added');


    }


}