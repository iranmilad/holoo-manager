<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user= Auth::user();
        return view('/dashboard', compact('user'));
    }


}
