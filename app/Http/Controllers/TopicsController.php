<?php

namespace App\Http\Controllers;

use App\Traits\WC;
use App\Models\User;
use App\Traits\Holo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    use WC;
    use Holo;
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $url = env('SERVICE_URL');
        $token = env('SERVICE_TOKEN');

        $user= Auth::user();
        // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();
        $user->config=json_decode($user->config);
        $wcPaymentGateways=$this->paymentGateways($user);


        $holoAccounts=$this->getAccounts($user);


        return view('topics', compact('wcPaymentGateways','user','holoAccounts'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

             // Update user config
            $user= Auth::user();
             // Update user config
            $user = User::where(['id'=>$user->id,])
            ->first();

            $config = json_decode($user->config);
            $payments = $request->input('holo');
            foreach($payments as $key=>$pay){
                $payments[$key]["vat"]=(!isset($pay["vat"])) ? 0 : 1;
            }
            $config->payment = $payments;


            //dd(json_encode($config));
            $user->config = json_encode($config);

            $user->save();
             // Redirect back with success message
            return redirect()->back()->with('success', 'تنظیمات با موفقیت به روز شد.');
    }

}
