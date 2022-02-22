<?php

namespace App\Http\Controllers\admin;

use App\Contacts;
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

    function moveleadsAdd(request $request){
        // dd($request->company_name);
      
        Contacts::create([
            'user_id' => (int)$request->user_id,
            'company_name' => $request->company_name,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'contact_email' => $request->contact_email,
            'contact_pincode' => $request->contact_pincode,
            'contact_query' => $request->contact_query,
            'name_slurry' => $request->name_slurry,
            'total_slurry' => $request->total_slurry,
            'desired_hours' => (int)$request->desired_hours,
            'specific_gravity' => $request->specific_gravity,
            'suspended_slurry' => $request->suspended_slurry,
            'size_micron' => $request->size_micron,
            'densitysolids' => $request->densitysolids,
            'ph_slurry' => $request->ph_slurry,
            'filtrate_important' => $request->filtrate_important,
            'type_filter' => $request->type_filter,
            'cake_washing' => $request->cake_washing,
            'cake_airing' => $request->cake_airing,
            'zero_leakage' => $request->zero_leakage,
            'maxi' => $request->maxi,
            'size_filter' => $request->size_filter,
            'nos_chambers' => $request->nos_chambers,
            'prefered_thickness' => $request->prefered_thickness,
            'types_automation' => $request->types_automation,
            'filtrate_delivery' => $request->filtrate_delivery,
            'number_filter_presses' => $request->number_filter_presses,
            'filter_presses' => serialize($request->filter_presses),
            'filter_plates' => serialize($request->filter_plates),
            'manufacture_yotana' => $request->manufacture_yotana,
            'size_filterpress' => serialize($request->size_filterpress),
            'use_filterpress' => $request->use_filterpress,
            'common_filterpress' => serialize($request->common_filterpress),
            'specific_problem' => $request->specific_problem,
            
          ]);
          return redirect()->route("admin.listManagerIndex")->withSuccess('You have signed-in');
    }

}
