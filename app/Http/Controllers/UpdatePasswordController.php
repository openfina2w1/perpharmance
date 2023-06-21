<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function index($email){
        return view("auth.passwords.updatepassword", compact('email'));
    }

    public function updatepassword(Request $request){
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        $user_data = User::where('email', $request['email'])->first();
        $user = User::findOrFail($user_data['id']);
        $user->password = Hash::make($request['password']);
        $user->active_status = 'Y';
        if($user->update()){
            return response()->json([
                'status' => 'success',
                'message' => 'Password has been updated successfully.'
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something wrong. Please try again!'
            ]);
        }
    }
}
