<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditUserController extends Controller
{
    public function show($id)
    {
        $infoUser = UserInformation::find($id);
        $auth = Auth::user();
        return view('users.edit', ['infoUser' => $infoUser, 'authUser' => $auth]);
    }

    public function edit_information(Request $request, $id)
    {
        UserInformation::find($id)->fill([
                'name' => $request->input('name'),
                'job_title' => $request->input('job_title'),
                'tel' => $request->input('tel'),
                'address' => $request->input('address'),
        ])->save();

        UserInformation::find($id)->user_info->fill([
            'name' => $request->input('name'),
        ])->save();

        return back()->with('status', 'Your data edited.');
    }
}
