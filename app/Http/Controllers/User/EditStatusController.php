<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditStatusController extends Controller
{
    public function show($id)
    {
        $statuses = [
            'success' => 'Онлайн',
            'offline' => 'Отошел',
            'warning' => 'Не беспокоить',
            'danger' => 'Не в сети'
        ];

        $dataUser = UserInformation::find($id);

        return view('users.status', ['authUser' => Auth::user(), 'statuses' => $statuses, 'dataUser' => $dataUser]);
    }

    public function editStatus(Request $request, $id)
    {
        UserInformation::find($id)->fill([
            'status' => $request->input('status'),
        ])->save();

        return back()->with('status', 'Your status is changed.');
    }
}
