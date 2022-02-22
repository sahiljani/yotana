<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class adminAjaxController extends Controller
{
    //

    public function updateManager(Request $request){
        $name = $request->values['name'];
        $email = $request->values['email'];
        $id = $request->values['id'];

        $admin = Admin::findOrFail($id);

        // Make sure you've got the Page model
        if($admin) {
            $admin->name = $name;
            $admin->email = $email;
            $admin->save();
            // $page->image = 'imagepath';
            // $page->save();
        }

        // $request->validate([
            // 'name' => 'required',
            // 'detail' => 'required',
        // ]);
        // // $updateManager->update($request->all());
        // return response()->json(['success'=>'Data Inserted']);

    }

    public function updatePassword(Request $request){
        $request = $request->all();
        $id = $request['id'];
        $password = $request['password'];
        $admin = Admin::findOrFail($id);
        if($admin) {
            $admin->password = Hash::make($password);
            $admin->save();
        }

        return response()->json(['success'=>'Password Changed']);

    }
    public function deleteData(Request $request){
        $request = $request->all();
        $id = $request['id'];

        $delete_data = Admin::find($id);
        $delete_data->delete();

        return response()->json(['success'=>'data Deleted']);

    }


}
