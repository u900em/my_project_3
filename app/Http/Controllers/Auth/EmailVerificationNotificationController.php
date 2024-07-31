<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('users');
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Verification link sent.');
    }
}
