<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class userController extends Controller
{

    public function passwordReset()
    {
        return view('admin.user.userPassword');
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;

        User::findOrFail($id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.logout');
    }
}
