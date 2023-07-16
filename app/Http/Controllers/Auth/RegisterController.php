<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required',
            'name' => 'required',
            'family' => 'required',
            'gender' => 'required',
            'card' => 'required',
            'date_of_birth' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = new User();
        $user->mobile = $request->user;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->family = $request->family;
        $user->gender = $request->gender;
        $user->card = $request->card;
        $user->date_of_birth = $request->date_of_birth;
        $token = bin2hex(random_bytes(8));
        $activation_link = route('verify', ['token' => $token]);
        $user->token = $token;
        Mail::to($user->email)->send(new VerifyEmail($user, $activation_link));
        $user->save();

        return redirect()->route('registerSuccess');
    }
}
