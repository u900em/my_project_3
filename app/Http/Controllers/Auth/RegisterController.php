<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function view_create()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required','string'],
            'email' => 'required|string|min:5|email|unique:users',
            'password' => 'required|confirmed|min:3',
        ]);

        $user = User::create($validate);
        DB::insert('insert into info_users (user_id, name, email) values (?, ?, ?)', [$user->id, $request->name, $request->email]);

        event(new Registered($user));

        Auth::login($user);
        return redirect('login')->with('status', 'A link has been sent to this email address to confirm email.');
    }

    public function user_is_not_verify()
    {
        return view('auth.not_verify');
    }
}
