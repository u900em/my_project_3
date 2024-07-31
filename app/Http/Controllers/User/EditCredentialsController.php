<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditCredentialsController extends Controller
{
    public function show($id)
    {
        $dataUser = UserInformation::find($id)->user_info;
        return view('users.security', ['credentials' => $dataUser, 'authUser' => Auth::user()]);
    }

    public function edit_security(Request $request, $id)
    {
        $arrEmails = UserInformation::get()->pluck('email')->all();
        $auth_user = Auth::user();
        $user_info = UserInformation::find($id)->user_info;

        /* Admin */
        if($auth_user->role == 1) {
            $validation = $request->validate([
                'email' => 'required|email'
            ]);

            if(in_array($validation['email'], $arrEmails)) {     
                if($validation['email'] == $auth_user->email) {
                    true;
                } else {
                    return back()->withErrors(['email' => 'In database already has that email address.']);
                }
            }

            $user_info->fill([
                'email' => $request->input('email'),
            ])->save();

            UserInformation::find($id)->fill([
                'email' => $request->input('email'),
            ])->save();

            return back()->with('status', 'Credentials of user with id '.$id.' edited.');
        }
        /* User */
        if($auth_user->role == 0) {
            $validation = $request->validate([
                'email' => 'email',
                'password' => 'required|min:3',
                'new_password' => 'required|min:3',
            ]);

            if(!Hash::check($request->password, $request->user()->password)) {
                return back()->withErrors([
                    'password' => ['The provided password does not match our records.']
                ]);
            }

            if(in_array($validation['email'], $arrEmails)) {
                if($validation['email'] == $auth_user->email) {
                    true;
                } else {
                    return back()->withErrors(['email' => 'In database already has that email address.']);
                }
            }

            $user_info->fill([
                'email' => $request->input('email'),
                'password' => $request->input('new_password')
            ])->save();

            UserInformation::find($id)->fill([
                'email' => $request->input('email'),
            ])->save();

            return back()->with('status', 'Your credentials edited.');
        }
    }
}
