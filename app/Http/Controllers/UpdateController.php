<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;

use App\Traits\Holo\Holo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class UpdateController extends Controller
{
    use Holo;
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
        $token = $user->dashboardToken;
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
            //dd($message);
            return redirect()->back()->with('success', $message);
        }
        elseif(isset($responseData['message'])){


            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('error', $message);
        }
        else{


            return redirect()->back()->with('error', 'خطای عدم دسترسی به سرویس کلاد');
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
        $token = $user->dashboardToken;
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
            return redirect()->back()->with('error', $message);
        }
        else{
            return redirect()->back()->with('error', 'خطای عدم دسترسی به سرویس کلاد');
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
        $token = $user->dashboardToken;
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
            Category::where(['user_id'=> $user->id,])
            ->delete();
            //dd($response);
            foreach($response as $key=>$holooCategory){
                $categories = new Category();
                $categories->name = $holooCategory["m_groupname"];
                $categories->code = $holooCategory["m_groupcode"];
                $categories->user_id = $user->id;
                $categories->save();
                usleep(100);
            }

            //dd($wcCategory);
            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('success', $message);
        }
        elseif(isset($responseData['message'])){
            $message = $responseData['message']; // Get the "message" value from the response
            return redirect()->back()->with('error', $message);
        }
        else{
            return redirect()->back()->with('error', 'خطای عدم دسترسی به سرویس کلاد');
        }
    }

    public function wcGetExcelProducts(Request $request,User $user){
        $user= Auth::user();
        // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();

        $url=$this->getExcelProducts($user);
        return Redirect::to($url);
        //return Response::download('file_to_download', 'end_user_filename', ['location' => $url]);
    }

    public function wcGetExcelProducts2(Request $request,User $user){
        $user= Auth::user();
        // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();
        if ($user->poshak==true){
            $content=$this->getExcelProducts3($user);
        }
        else{
            $content=$this->getExcelProducts2($user);
        }
        $response = response($content, 200, [
            'Content-Type' => 'application/json',
            'Content-Disposition' => 'attachment; filename="product.xls"',
        ]);
        return $response;
    }


}
