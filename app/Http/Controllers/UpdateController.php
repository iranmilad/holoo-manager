<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $user= Auth::user();
            // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();
        $user->config=json_decode($user->config);

        return view('updates', compact('user'));
    }

    /**
     * Display the specified resource updateAllProductFromHolooToWC.
     */
    public function updateAllProductFromHolooToWC(User $user)
    {
        $user= Auth::user();
            // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();
        //$config = json_decode($user->config);
        $config = $user->config;

        $curl = curl_init();
        $url = env('SERVICE_URL');
        $token = env('SERVICE_TOKEN');
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'/updateAllProductFromHolooToWC',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_POSTFIELDS =>$config, // convert data array to JSON
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
          ),
        ));

        $response = curl_exec($curl);
        $responseData = json_decode($response, true); // Decode the JSON response

        curl_close($curl);
        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code
        if ($responseCode == 200) {

            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('success', $message);
        }
        elseif(isset($responseData['message'])){


            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('alert', $message);
        }
        else{


            return redirect()->back()->with('alert', 'خطای عدم دسترسی به سرویس کلاد');
        }



    }

    /**
     * Display the specified resource wcAddAllHolooProductsCategory.
     */
    public function wcAddAllHolooProductsCategory(User $user)
    {
        $user= Auth::user();
        // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();
        //$config = json_decode($user->config);
        $config = $user->config;

        $curl = curl_init();
        $url = env('SERVICE_URL');
        $token = env('SERVICE_TOKEN');
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'/wcAddAllHolooProductsCategory',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_POSTFIELDS =>$config, // convert data array to JSON
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
          ),
        ));

        $response = curl_exec($curl);
        $responseData = json_decode($response, true); // Decode the JSON response

        curl_close($curl);
        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code
        if ($responseCode == 200) {
            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('success', $message);
        }
        elseif(isset($responseData['message'])){
            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('alert', $message);
        }
        else{
            return redirect()->back()->with('alert', 'خطای عدم دسترسی به سرویس کلاد');
        }



    }

    /**
     * Display the specified resource getProductCategory.
     */
    public function getProductCategory(User $user)
    {
        $user= Auth::user();
        // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();

        //$config = json_decode($user->config);
        $config = $user->config;

        $curl = curl_init();
        $url = env('SERVICE_URL');
        $token = env('SERVICE_TOKEN');
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'/getProductCategory',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_POSTFIELDS =>$config, // convert data array to JSON
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
          ),
        ));

        $response = curl_exec($curl);
        $responseData = json_decode($response, true); // Decode the JSON response

        curl_close($curl);
        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code

        if ($responseCode == 200) {
            $response = $responseData['response']["result"];
            //dd($response);
            foreach($response as $key=>$holooCategory){
                $categories = new Category();
                $categories->name = $holooCategory["m_groupname"];
                $categories->code = $holooCategory["m_groupcode"];
                $categories->user_id = $user->id;
                $categories->save();
                sleep(1);
            }

            //dd($wcCategory);
            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('success', [$message,]);
        }
        elseif(isset($responseData['message'])){
            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('alert', $message);
        }
        else{
            return redirect()->back()->with('alert', 'خطای عدم دسترسی به سرویس کلاد');
        }
    }



}
