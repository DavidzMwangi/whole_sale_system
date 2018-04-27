<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PurchaseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function displayNewPurchase()
    {
        $supplies=Supply::all();
        $buyers=Buyer::all();
        //query the last existing purchase code in order to get the next purchase code
        $latest_record_purchase_code=DB::table('purchases')->latest()->first();
        if ($latest_record_purchase_code==null || $latest_record_purchase_code==""){
            $latest_record_purchase_code=1000;
        }else{
            $latest_record_purchase_code=$latest_record_purchase_code->purchase_code;
        }
        return View::make('purchase.new_purchase')
                    ->with('supplies',$supplies)
                    ->with('buyers',$buyers)
                    ->with('latest_record_purchase_code',$latest_record_purchase_code);
    }

    public function productInfoToDisplay(Request $request)
    {
        $product_id=$request->input('product_id_2_display_discount_table');
        $discounts=Discount::where('product_id','=',$product_id)
            ->whereDate('end_date','>s=',Carbon::today())->orderBy('created_at','desc')->get();

        return Response::json([
            'result33'=>$request->all(),
            'discounts'=>$discounts,
        ]);
    }

    public function getSimilarProducts(Request $request)
    {
        $first_product=Product::find($request->input('product_id_2_get_similar_products'));
        //get all the products that have the same supplies id and product size
        $similar_products=Product::where('supplies_id','=',$first_product->supplies_id)
                                    ->where('product_size','=',$first_product->product_size)
                                    ->get();
        //calculate the total available products using foreach
        $product_amount=0;
        foreach ($similar_products as $similar_product) {
        $product_amount=$product_amount+$similar_product->product_supplied_amount;

        }

        //get one record details the single product selling price
        $displayInput=Product::where('supplies_id','=',$first_product->supplies_id)
            ->where('product_size','=',$first_product->product_size)
            ->first();
        //get the discount details of the single product
        $single_discount_details=Discount::where('product_id','=',$displayInput->id)->orderBy('created_at','desc')->first();


        return Response::json([
            'result33'=>$request->all(),
            'displayInput'=>$displayInput,
            'product_amount'=>$product_amount,
            'single_discount_details'=>$single_discount_details,
        ]);
    }

    public function getProductName(Request $request)
    {
        $supply_detail_for_product_name=Supply::find($request->input('supply_id'));
        return Response::json([
            'result99'=>$request->all(),
            'supply_detail'=>$supply_detail_for_product_name,
        ]);
    }

    public function savePurchase(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'supply_id_to_save'=>'required',
            'purchase_code_to_save'=>'required',
            'buyer_id_to_save'=>'required',
            'purchased_amount_to_save'=>'required',
            'purchase_total_cost_to_save'=>'required',
            'single_product_selling_price_to_save'=>'required',
            'discount_amount_to_save'=>'required'
        ]);
        if ($validator->fails()){
            return Response::json([
                'status'=>'fail'
            ]);
        }

        $purchase=new Purchase();
        $purchase->supply_id=$request->input('supply_id_to_save');
        $purchase->purchase_code=$request->input('purchase_code_to_save');
        $purchase->buyer_id=$request->input('buyer_id_to_save');
        $purchase->single_product_selling_price=$request->input('single_product_selling_price_to_save');
        $purchase->purchased_amount=$request->input('purchased_amount_to_save');
        $purchase->purchase_total_cost=$request->input('purchase_total_cost_to_save');
        $purchase->discount_amount=$request->input('discount_amount_to_save');
        $purchase->	is_paid=false;
        $purchase->save();


        $saved_record_id=$purchase->id;
        $saved_record=Purchase::find($saved_record_id);


        //deduct the product amount after paying to avoid the scenario where a purchase is cancelld and product have a already been deducted
        return Response::json([
            'result67'=>$request->all(),
            'saved_record'=>$saved_record->load('Supply'),
        ]);
    }

    public function purchaseToDelete(Request $request)
    {
        //use the purchase code to filter the records
        $purchases=Purchase::where('purchase_code',$request->input('current_purchase_code'))
                            ->orderBy('created_at','asc')->get();
        //use the index to get the specific record
        $purchase=$purchases[$request->input('index_for_selected_purchase')];

        //delete the purchase
        Purchase::find($purchase->id)->delete();


    }

    public function displayExistingPurchases()
    {
        $purchases = Purchase::select('purchase_code','is_paid')
            ->groupBy('purchase_code','is_paid')
            ->get();
        return View::make('purchase.existing_purchases')->with('purchases',$purchases);
    }

    public function deletePurchase($purchase_code)
    {
        //delete the purchase
        Purchase::where('purchase_code',$purchase_code)->delete();

        return redirect('existing_purchases');
    }
}
