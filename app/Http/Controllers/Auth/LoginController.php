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
        if ($user->dashboardToken==null){
            $curl = curl_init();
            $url = env('SERVICE_URL');
            $siteUrl = $user->siteUrl;
            $activeLicense = $user->activeLicense;

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url.'/login',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array('siteUrl' => $siteUrl,'activeLicense' => $activeLicense),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // Decode the JSON response
            $responseData = json_decode($response, true);
            dd($responseData);
            // Check if the response is successful
            if ($responseData['responseCode'] == 200) {
                // Get the token from the response
                $token = $responseData['response']['token'];
                User::where(['id'=>$user->id,])
                ->update([
                'dashboardToken' => $token,
                ]);
                // Output the token

            }
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
