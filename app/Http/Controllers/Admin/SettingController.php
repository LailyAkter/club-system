<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use Hash;
use App\User;

class SettingController extends Controller
{
    public function profile(){
        return view('admin.settings.profile');
    }

    public function profileUpdate(Request $request){

        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        Toastr::success('Profile Updated Successfully','Success');

        return redirect('dashboard');
    }


    public function passwordChange(){
        return view('admin.settings.setting');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed:password_confirmation'
        ]);

        $hasedPassword = Auth::user()->password;

        if(Hash::check($request->old_password,$hasedPassword)){
            if(!Hash::check($request->password,$hasedPassword)){
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();

                Toastr::success('Password Updated Successfully','Success');
                Auth::logout();
            }else{
                Toastr::error('New Password Can not be Same as Old Password','Error');
            }
        }else{
            Toastr::error('Current Password Not Match','Error');
        }
        //redirect()->route( 'clients.show' )->with( [ 'id' => $id ] )
        return redirect()->back();
    }

}
