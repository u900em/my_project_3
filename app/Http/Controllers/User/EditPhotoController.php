<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditPhotoController extends Controller
{
    public function show($id)
    {
        $dataUser = UserInformation::find($id);
        return view('users.media', ['authUser' => Auth::user(), 'dataUser' => $dataUser]);
    }

    public function editImage(Request $request, $id)
    {
        $dataUser = UserInformation::find($id);
        if ($request->hasFile('image')) {
            Storage::delete($dataUser->image);
            $image = $request->image->storeAs('style/img/demo/avatars', uniqid().'.png');
            $dataUser->fill(['image' => $image])->save();
            return back()->with('status', 'Your avatar is changed.');
        } else {
            $request->validate([
                'image' => 'required'
            ]);
        }
    }

    public function deleteImage($id)
    {
        $dataUser = UserInformation::find($id);
        Storage::delete($dataUser->image);
        $dataUser->fill(['image' => ''])->save();
        return back()->with('status', 'Your avatar is delete.');
    }
}
