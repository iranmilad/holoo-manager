<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Webhook;
use Illuminate\Http\Request;
use App\Models\ProductRequest;
use Illuminate\Support\Facades\Auth;

class TechnicalReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user= Auth::user();
        // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();

        $webhooks= Webhook::whereDate('updated_at', Carbon::today())->where(['user_id'=>$user->id,])->orderByDesc('updated_at')->get() ;

        $invoices= Invoice::whereDate('updated_at', Carbon::today())->where(['user_id'=>$user->id,])->orderByDesc('updated_at')->get();

        $requests = ProductRequest::where(['user_id'=>$user->id,])->orderByDesc('updated_at')->get();


        return view('technicalreporting', compact('webhooks','user','invoices','requests'));
    }

    public function sendWebhook($id)
    {



        $webhook= Webhook::where(['id'=>$id,])->get()->first();
        $content = json_encode($webhook->content);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.laravel.clawar-services.org/api/webhook',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$content,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        $responseData = json_decode($response, true); // Decode the JSON response

        curl_close($curl);
        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code

        if ($responseCode == 200) {

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
