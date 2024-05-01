<?php

namespace App\Http\Controllers;

use App\Traits\Holo\Holo;
use App\Traits\Wc\Wc;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class ProductController extends Controller
{
    use WC;
    use Holo;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user= Auth::user();
        $user->config=json_decode($user->config);
        $wcCategories=$this->getWcCategory($user);
        //dd($user->config->product_cat->{"01-01"});

        $categories = Category::where(['user_id'=>$user->id,])->get()
        ->all();

        return view('products', compact('wcCategories','user','categories'));
    }

    /**
     * get holo product list for special user
     */
    public function getHoloProductList($id)
    {
        $user= Auth::user();
        $holooProductCategories=$this->getGroupProducts($user,$id);
        return (object)["data"=>$holooProductCategories];
    }
    /**
     *
     * get wc sub category list for special user
     */
    public function getWcSubCategoryList($categoryId)
    {
        $user= Auth::user();
        $WcCategoryChildren  = $this->getWcCategoryChildren($user, $categoryId);
        return (object)["data"=>$WcCategoryChildren];
    }
    /**
     * add one product to wc.
     */
    public function addProduct(Request $request)
    {

        $user= Auth::user();
        $productGp=$request->input("productGp");
        $targetGp=$request->input("targetGp");
        $id=$request->input("id");
        $rowId=$request->input("rowId");


        $config = json_decode($user->config);
        $user = User::where(['id'=>$user->id,])
        ->first();
        $selected=(array)$config->product_cat->{$productGp};

        array_unshift( $selected, $targetGp );
        $selected=array_unique($selected);
        $config->product_cat->{$productGp} = $selected;

        $user->config = json_encode($config);
        $user->save();

        $holooProductCategories=$this->getGroupProducts($user,$productGp);
        foreach($holooProductCategories as $key=>$value){
            if( $value->id == $id ){
                if ($value->poshak!=null){
                    $this->addProductsPoshakWebhook($user,[$id]);
                }
                else{
                    $this->addProductsWebhook($user,[$id]);
                }
                $data=(object)[];
                $data = $value;
                $data->{"rowId"} =(int)$rowId;

                return (object)["data"=>$data,"message"=>"درخواست با موفقیت ارسال شد"];
            }

        }


    }

    /**
     * add multi producta to wc.
     */
    public function addProducts(Request $request)
    {
        // array (
        //     'productGp' => '03-01',
        //     'targetGp' => '1071',
        //     'ids' => '[{"id":"0301002","rowId":"1"},{"id":"0301001","rowId":"0"}]',
        // )

        $user= Auth::user();
        log::info(request());

        $productGp=$request->input("productGp");
        $targetGp=$request->input("targetGp");
        $ids=json_decode($request->input("ids"));



        $config = json_decode($user->config);
        $user = User::where(['id'=>$user->id,])
        ->first();
        $selected=(array)$config->product_cat->{$productGp};

        array_unshift( $selected, $targetGp );
        $selected=array_unique($selected);
        $config->product_cat->{$productGp} = $selected;

        $user->config = json_encode($config);
        $user->save();

        $holooProductCategories=$this->getGroupProducts($user,$productGp);
        $total=[];
        $total_ides=[];
        $total_ides_poshak=[];

        foreach($holooProductCategories as $key=>$value){
            foreach($ids as $id){

                if( $value->id == $id->id ){

                    $data=(object)[];
                    $data = $value;
                    $data->{"rowId"} =(int) $id->rowId;
                    $total[]=$data;
                    if ($value->poshak!=null){
                        $total_ides_poshak[]=$id->id;
                    }
                    else{
                        $total_ides[]=$id->id;
                    }

                }
            }

        }
        if(count($total_ides)>0){
            $this->addProductsWebhook($user,$total_ides);
        }
        if(count($total_ides_poshak)>0){
            $this->addProductsPoshakWebhook($user,$total_ides_poshak);
        }


        return (object)["data"=> $total,"message"=>"درخواست با موفقیت ارسال شد"];


    }


}
