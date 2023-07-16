<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Messages extends Controller
{
    public function index(Request $request)
    {
        //$dataArray = $request->input('data'); // Retrieve the array of data from the request

        // Process the data as needed
        //$data: [{id: 2,name: "سارا محمدی", profile: null,seen: null,sent: "1401/11/05",body: "سلام، چه خبر؟"}]}
        // Return a response
        return (object)["data"=>[],"message"=>"درخواست با موفقیت ارسال شد"];
        //return response()->json(['message' => 'Data received and processed successfully']);
    }

    public function show(){
        $user= Auth::user();
        return view('messages');
    }
}
