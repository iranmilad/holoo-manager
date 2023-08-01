<?php

namespace App\Http\Controllers;


use App\Traits\Wc\Wc;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductCategoryController extends Controller
{
    use WC;
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user= Auth::user();
        $user->config=json_decode($user->config);
        $wcCategories=$this->getWcCategory($user);
        //dd($user->config->product_cat->{"01-01"});

        $categories = Category::where(['user_id'=>$user->id,])->get()
        ->all();

        return view('productsCategory', compact('wcCategories','user','categories'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
            $user= Auth::user();
             // Update user config
            $user = User::where(['id'=>$user->id,])
            ->first();

            $config = json_decode($user->config);
            $product_cat = $request->input('holo');
            log::info($product_cat);
            //$product_cat = json_encode($product_cat);
            //dd($product_cat);
            $config->product_cat = $product_cat;


            #dd(json_encode($config));
            $user->config = json_encode($config);

            $user->save();
             // Redirect back with success message
            return redirect()->back()->with('success', 'تنظیمات با موفقیت به روز شد.');
    }


}
