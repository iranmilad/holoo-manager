<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 10;

        $user = DB::table('users')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->paginate($perPage);

        return view('user.index', compact('user'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => '',
            'name' => 'required,min:2,max:100',
            'email' => 'required,max:255,unique:users,email',
            'password' => 'required,min:8,max:100',
            'mobile_number' => 'required,min:10,max:15,unique:users',
            'phone_number' => 'required,min:10,max:15,unique:users',
            'postal_code' => 'required,min:5,max:10',
            'gender' => 'required,in:male,female',
            'date_of_birth' => 'required',
            'remember_token' => 'min:8,max:8',
            'email_verified_at' => '',
            'created_at' => '',
            'updated_at' => '',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Record created successfully.');
    }

    public function show(User $user)
    {
        $user= Auth::user();
        return view('account', compact('user'));
    }

    public function edit(User $users)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'mobile' => 'required|min:10|max:15',
            'email' => 'required|min:10|max:30',
        ]);
        $user= Auth::user();
        $user=User::where(['id'=>$user->id,])
        ->update([
            'name' =>$request->input('name') ,
            'mobile' =>$request->input('mobile') ,
            'email' =>$request->input('email') ,
        ]);
        //$users->update($request->all());

        return redirect()->route('profile.show')
            ->with('success', 'Record updated successfully.');
    }

    public function destroy(User $user)
    {
       $user->delete();

       return redirect()->route('users.index')
           ->with('success', 'Record deleted successfully.');
   }

}
