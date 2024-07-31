<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordConfirmationController extends Controller
{
    public function show()
    {
        return view('auth.confirm_password');
    }

    public function store(Request $request)
    {
        if(! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }
        /*запись в сессию подтверждения пароля пользователем, с помощью метода passwordConfirmed() */
        $request->session()->passwordConfirmed();

        return redirect()->intended('users');
    }
}
