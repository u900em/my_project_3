<?php

namespace App\Http\Controllers\User;

use App\Models\UserInformation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function main_page()
    {
        $infoUser = UserInformation::find(Auth::id());
        return view('page_profile', ['user' => $infoUser]);
    }

    public function show()
    {
        $users = DB::table('info_users')->get()->collect()->all();
        $auth_user = Auth::user();
        return view('users.users', ['auth_user' => $auth_user, 'users' => $users]);
    }
}
