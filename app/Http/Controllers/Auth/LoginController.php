<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function show(User $user)
    {

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|min:11',
            'password' => 'required|min:8',
        ]);

        $user = User::where('mobile', $request->mobile)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'users' => 'The provided credentials are incorrect.',
            ]);
        }

        // if ($user->email_verified_at === null) {
        //     return redirect()->route('verify');
        // }

        Auth::login($user, $request->has('remember'));
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show_login');
    }

}
