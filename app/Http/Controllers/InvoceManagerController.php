<?php

namespace App\Http\Controllers;

use App\Traits\Holo\Holo;
use App\Traits\Wc\Wc;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Category;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Morilog\Jalali\CalendarUtils;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class InvoceManagerController extends Controller
{
    use WC;
    use Holo;

    /**
     * Display a listing of the resource.
     */
    public function index($date)
    {
        //{data: [{id: 123 , name: "فرهاد باقری", price: "24000", status: 0, date: "1400-01-01"}]}
        $user= Auth::user();
        $dateTime = CalendarUtils::createDatetimeFromFormat('Y-m-d', $date);

        $startOfDay = $dateTime->format('Y-m-d 00:00:00');
        $endOfDay = $dateTime->format('Y-m-d 23:59:59');

        $invoices = Invoice::where(['user_id'=>$user->id])
                            ->whereBetween("created_at", [$startOfDay, $endOfDay])
                            ->whereIn("invoiceStatus",['processing'])
                            ->get()->all();

        $total=[];

        foreach ($invoices as $invoice){

            $total[]=(object)[
                "id"=> $invoice->invoiceId,
                "name"=> $invoice->invoice["billing"]["first_name"]." ".$invoice->invoice["billing"]["last_name"],
                "price" =>$invoice->invoice["total"],
                "status" => ($invoice->status =="ثبت سفارش فروش انجام شد" ? 1 : 0),
                "date" => Jalalian::fromFormat('Y-m-d H:i:s', $invoice->created_at)->format('%A, %d %B %y')
            ];
        }
        return (object)["data"=>$total];
    }



    /**
     * add one Invoice to wc.
     */
    public function addInvoice(Request $request)
    {

        $user= Auth::user();

        $id=$request->input("id");
        $rowId=$request->input("rowId");



        $user = User::where(['id'=>$user->id,])
        ->first();


        $invoice = Invoice::where(['user_id'=>$user->id,"invoiceId"=>$id,"invoiceStatus"=>'processing'])->first();
        Invoice::where(['id'=>$invoice->id])
        ->update([
            'status' => null,
        ]);


        $this->addInvoicesWebhook($user,[$invoice]);
        $invoice = Invoice::where(['id'=>$invoice->id])->first();

        $data=(object)[
            "id"=> $invoice->invoiceId,
            "name"=> $invoice->invoice["billing"]["first_name"]." ".$invoice->invoice["billing"]["last_name"],
            "price" =>$invoice->invoice["total"],
            "status" => ($invoice->status =="ثبت سفارش فروش انجام شد" ? 1 : 0),
            "date" => Jalalian::fromFormat('Y-m-d H:i:s', $invoice->created_at)->format('%A, %d %B %y'),
            "rowId" => (int)$rowId
        ];



        return (object)["data"=>$data,"message"=>"درخواست با موفقیت ارسال شد"];





    }

    /**
     * add multi Invoicea to wc.
     */
    public function addInvoices(Request $request)
    {
        $user= Auth::user();

        $ids=json_decode($request->input("ids"));
        $rowId=$request->input("rowId");



        $user = User::where(['id'=>$user->id,])
        ->first();

        $data=[];
        foreach($ids as $row){
            $id=$row->id;

            $invoice = Invoice::where(['user_id'=>$user->id,"invoiceId"=>$id,"invoiceStatus"=>'processing'])->first();

            Invoice::whereIn('id',[$id])
            ->update([
                'status' => null,
            ]);

            $this->addInvoicesWebhook($user,[$invoice]);
            $invoice = Invoice::where(['id'=>$invoice->id])->first();

            $data[]=(object)[
                "id"=> $invoice->invoiceId,
                "name"=> $invoice->invoice["billing"]["first_name"]." ".$invoice->invoice["billing"]["last_name"],
                "price" =>$invoice->invoice["total"],
                "status" => ($invoice->status =="ثبت سفارش فروش انجام شد" ? 1 : 0),
                "date" => Jalalian::fromFormat('Y-m-d H:i:s', $invoice->created_at)->format('%A, %d %B %y'),
                "rowId" => (int)$row->rowId
            ];
        }



        return (object)["data"=>$data,"message"=>"درخواست با موفقیت ارسال شد"];


    }

    /**
     * Update the specified resource in storage.
     */
    public function invoicesActive(Request $request, User $user)
    {

            // Update user config
            $user= Auth::user();
            // Update user config
            $user = User::where(['id'=>$user->id,])
            ->first();

            $config = json_decode($user->config);

            $config->save_sale_invoice = $request->input('config.save_sale_invoice');


            #dd(json_encode($config));
            $user->config = json_encode($config);

            $user->save();
             // Redirect back with success message
            return redirect()->back()->with('success', 'تنظیمات با موفقیت به روز شد.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user= Auth::user();
        // Update user config
        $user = User::where(['id'=>$user->id,])
        ->first();
        $user->config=json_decode($user->config);

        return view('invoicesManager', compact('user'));
    }

}
