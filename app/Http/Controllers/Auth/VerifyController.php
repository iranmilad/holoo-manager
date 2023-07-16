<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

use App\Models\Users;

class VerifyController extends Controller
{
    public function index(Request $request)
    {
        return view('verify');
    }

    public function verify(Request $request)
    {
        $user = Users::where('token', $request->token)->first();
        if (!$user) {
            return redirect()->route('wrongToken');
        }

        $user->email_verified_at = now();
        $user->token = null;
        $user->save();
        return redirect()->route('verified');
    }

    public function wrongToken(Request $request)
    {
        return view('wrongToken');
    }

    public function verified(Request $request)
    {
        return view('verified');
    }


    public function sendActivationLink(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $token = bin2hex(random_bytes(8));
            $user->token = $token;
            $user->save();
            // Send activation link to user
            // Code to send the activation link
            $activation_link = route('verify', ['token' => $token]);
            Mail::to($user->email)->send(new VerifyEmail($user, $activation_link));
        }
        return redirect()->route('verify')->with('message', 'The activation link for your account has been successfully sent to your email.');
    }
}
