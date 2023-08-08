<?php

namespace App\Http\Controllers;

use App\Traits\Holo\Holo;
use App\Traits\Wc\Wc;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class IssueReportsController extends Controller
{
    use Wc;
    use Holo;

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        ini_set('max_execution_time', 300);
        ini_set("memory_limit", "1G");
        $user= Auth::user();
        $user->config=json_decode($user->config);

        $wc_product = $this->testWcProduct($user);

        $wc_category = count($this->getWcCategory($user))>0 ? true : false ;
        $wc_products = count($wc_product['products'])>0 ? true : false ;
        $wc_response = $wc_product['response']==200 ? 200 : $wc_product['response'] ;
        $wc_time = $wc_product['executionTime'];
        $validDomain=true;
        $domain = $user->siteUrl; // Replace with your domain variable
        if (!preg_match("~^(?:https?://)~", $domain)) {
            $validDomain=false;
        }
        $testpage1=$this->testPage1HolooProducts($user);
        log::info('test holo page 1 product finish');
        $cloud_product_count = $this->testProductsPagingCount($user);
        log::info('test holo product count finish');
        if ($testpage1["count"]==0 and $cloud_product_count["count"]>0)
        $cloud_product_count["count"] = 0;

        //return $cloud_product_count;
        $cloud_account_count=$this->testHoloAccounts($user);
        log::info('test holo account finish');
        $cloud_customer_count = $this->testHoloCustomerAccount($user);
        log::info('test holo customer account finish');
        $cloud_category_count = $this->testHoloCategorys($user);
        log::info('test holo category finish');

        return view('issuereporting', compact('user','wc_category','wc_products','wc_response','wc_time','validDomain','cloud_product_count','cloud_account_count','cloud_customer_count','cloud_category_count'));
    }

}
