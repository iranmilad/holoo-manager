<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionsController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       $user= Auth::user();
        // Update user config
       $user = User::where(['id'=>$user->id,])
       ->first();

        return view('subscriptions', compact('user'));
    }

}
