<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateUserController extends Controller
{
    public function show()
    {
        $statuses = [
            'success' => 'Онлайн',
            'offline' => 'Отошел',
            'warning' => 'Не беспокоить',
            'danger' => 'Не в сети'
        ];

        return view('users.create_user', ['statuses' => $statuses, 'authUser' => Auth::user()]);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required','string',
            'job_title' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:3|string',
            'image' => 'required'
        ]);
        
        $user = $request->user()->create($validate);

        DB::insert('insert into info_users (user_id, name, job_title, tel, address, email, image) values (?, ?, ?, ?, ?, ?, ?)', [$user->id, $request->name, $request->job_title, $request->tel, $request->address, $request->email, $request->image->storeAs('style/img/demo/avatars', uniqid().'.png')]);

        return redirect('users')->with('status', 'User with ID:'. $user->id .' is created.');
    }
}
