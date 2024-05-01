<?php

namespace App\Traits\Wc;


trait Wc{

    /**
     * @param User $user
     * @return array
     */
    public function getWcCategory($user): array
    {
        $page = 1;
        $perPage = 100;
        $categorys = [];

        while (true) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $user->siteUrl . '/wp-json/wc/v3/products/categories?page=' . $page . '&per_page=' . $perPage,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_USERAGENT => 'Holoo',
                CURLOPT_USERPWD => $user->consumerKey . ":" . $user->consumerSecret,
            ));

            $response = curl_exec($curl);

            $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code

            if ($responseCode == 200) {
                $responseData = json_decode($response, true); // Decode the JSON response

                if ($responseData != null) {
                    foreach ($responseData as $value) {
                        $category = (object) array("code" => $value["id"], "name" => $value["name"]);
                        $categorys[] = $category;
                    }

                    // افزایش شماره صفحه برای دریافت صفحه بعدی
                    $page++;

                    // اگر تعداد آیتم‌ها کمتر از تعداد درخواست شده بود، به اتمام رسیده‌ایم
                    if (count($responseData) < $perPage) {
                        break;
                    }
                } else {
                    // اگر پاسخ JSON خالی بود، خروج از حلقه
                    break;
                }
            } else {
                // اگر کد پاسخ ناموفق بود، خروج از حلقه
                break;
            }

            curl_close($curl);
        }

        return $categorys;
    }



    /**
     * @param User $user
     * @param int $categoryId
     * @return array
     */
    public function getWcCategoryChildren($user, $categoryId): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $user->siteUrl . '/wp-json/wc/v3/products/categories/' . $categoryId . '/children',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => 'Holoo',
            CURLOPT_USERPWD => $user->consumerKey . ":" . $user->consumerSecret,
        ));

        $response = curl_exec($curl);

        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code
        $categorys = [];
        if ($responseCode == 200) {
            $responseData = json_decode($response, true); // Decode the JSON response
            if ($responseData != null) {
                foreach ($responseData as $value) {
                    $categorys[] = (object)array("code" => $value["id"], "name" => $value["name"]);
                }
            }
        }

        curl_close($curl);
        return $categorys;
    }

    public function paymentGateways($user):array {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $user->siteUrl.'/wp-json/wc/v3/payment_gateways',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => 'Holoo',
            CURLOPT_USERPWD => $user->consumerKey. ":" . $user->consumerSecret,
        ));

        $response = curl_exec($curl);


        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code
        $gateways=[];
        if ($responseCode == 200) {
            $responseData = json_decode($response, true); // Decode the JSON response
            if ($responseData!=null)
            foreach($responseData as $value){
                $gateways[]=(object)array("id"=>$value["id"],"title"=>$value["title"]);
            }
        }

        curl_close($curl);
        return $gateways;
    }


    /**
     * @param User $user
     * @return $this|array
     */
    public function testWcProduct($user):array {

        $startTime = microtime(true); // Start time
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $user->siteUrl.'/wp-json/wc/v3/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => 'Holoo',
            CURLOPT_USERPWD => $user->consumerKey. ":" . $user->consumerSecret,
        ));

        $response = curl_exec($curl);

        $endTime = microtime(true); // End time
        $executionTime = round($endTime - $startTime, 2);  // Calculate execution time in seconds

        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get the response code
        $products=[];
        if ($responseCode == 200) {
            $responseData = json_decode($response, true); // Decode the JSON response
            if ($responseData!=null){
                foreach($responseData as $value){
                    $products[]=(object)array("code"=>$value["id"],"name"=>$value["name"]);
                }

            }
        }

        curl_close($curl);
        return ["products"=>$products,"response"=>$responseCode, "executionTime" => $executionTime];
    }

}
