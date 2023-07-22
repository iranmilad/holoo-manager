<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function updateCustomerSarfasl(Request $request, User $user)
    {

            // Validate form data
            $request->validate([
                'customer_sarfasl' => 'required',
            ]);
            $user= Auth::user();
             // Update user config
            $user = User::where(['id'=>$user->id,])
            ->first();



            $user->customer_sarfasl = $request->input('customer_sarfasl');

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

        return view('settings', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

            // Validate form data
            $request->validate([
                'config.invoice_items_no_holo_code' => 'required',
                'config.status_place_payment' => 'required',
                'config.sales_price_field' => 'required',
                'config.special_price_field' => 'required',
                'config.wholesale_price_field' => 'required',
                'config.product_stock_field' => 'required',
                'config.save_sale_invoice' => 'required',
                'config.save_pre_sale_invoice' => 'required',
            ]);
            // Update user config
            $user= Auth::user();
            // Update user config
            $user = User::where(['id'=>$user->id,])
            ->first();

            $config = json_decode($user->config);

            $config->invoice_items_no_holo_code = $request->input('config.invoice_items_no_holo_code');
            $config->status_place_payment = $request->input('config.status_place_payment');
            $config->sales_price_field = $request->input('config.sales_price_field');
            $config->special_price_field = $request->input('config.special_price_field');
            $config->wholesale_price_field = $request->input('config.wholesale_price_field');
            $config->product_stock_field = $request->input('config.product_stock_field');
            $config->save_sale_invoice = $request->input('config.save_sale_invoice');
            $config->save_pre_sale_invoice = $request->input('config.save_pre_sale_invoice');
            $config->update_product_stock = $request->input('config.update_product_stock');
            $config->update_product_price = $request->input('config.update_product_price');
            $config->update_product_name = $request->input('config.update_product_name');
            $config->insert_new_product = $request->input('config.insert_new_product');
            $config->invoice_items_no_holo_code = $request->input('config.invoice_items_no_holo_code');

            #dd(json_encode($config));
            $user->config = json_encode($config);

            $user->save();
             // Redirect back with success message
            return redirect()->back()->with('success', 'تنظیمات با موفقیت به روز شد.');

    }






}
