<?php

namespace App\Http\Controllers\User;

use App\Models\UserInformation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DeleteUserController extends Controller
{
    public function deleteUser($id)
    {
        Storage::delete(UserInformation::find($id)->image);
        DB::table('info_users')->where('id', $id)->delete();
        DB::table('users')->where('id', $id)->delete();

        if(Auth::user()) {
            return back()->with('status', 'User with ID:'.$id.' is delete.');
        } else {
            return redirect('login')->with('status', 'Your profile is delete.');
        }
    }
}
