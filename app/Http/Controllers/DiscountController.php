<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Supply;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;

class DiscountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function allDiscounts()
    {
        //get all the product names from the supplies table
        $supplies=Supply::all();
        return View::make('discount.new_discount')
                    ->with('supplies',$supplies);
    }

    public function ProductSize(Request $request)
    {
        $supply_id=$request->input('supply_id_for_product_size');
        //get the product name of the record with this supply id
        $product_name1=Supply::find($supply_id);
        $product_name=$product_name1->product_name;

        //get all the records with similar product name
        $records=Supply::where('product_name','=',$product_name)->get();
         $records_ids=$records->pluck('id'); //this is the id of the records

        //loop through each records looking for the records it is related with in products using supplies id and saving it in an array variable
       //multi dimensional array to save unit type
        $product_size=array();

        foreach ($records_ids as $records_id){
            $product_size[]=Product::where('supplies_id','=',$records_id)->get()->pluck('id');
//                ->pluck('product_size');
        }



        $product_size2=Product::find($product_size);


        return Response::json([
            'result11'=>$request->all(),
            'product_size'=>$product_size2,

        ]);

    }

    public function insideFun(Request $request)
    {
        //first get the unit id from the supplies table using the supplies id
        if (is_array($request->input('crazy_supplies_id'))) {
            $unit_id = Supply::where('unit_id', '=', $request->input('crazy_supplies_id'))->first();
        }else{
            $unit_id=Supply::find($request->input('crazy_supplies_id'));
        }
        //get the unit name using the unit id
        $unit=Unit::find($unit_id->unit_id);
        return Response::json([
            'result112'=>$request->all(),
            'unit'=>$unit,
        ]);
    }

    public function displayTable(Request $request)
    {
       //get the supplies id and the product size from the product using product id then use it to
        //search for any other records that have the two similar values

        $selected_product=Product::find($request->input('product_id_2_display_table'));
        //the supplies id and product size of the selected product
        $selected_product_supplies_id=$selected_product->supplies_id;
        $selected_product_product_size=$selected_product->product_size;

        //get all the records in the product table that have the same supplies id AND product size
        $products=Product::where('supplies_id','=',$selected_product_supplies_id)
                            ->where('product_size','=',$selected_product_product_size)->get();
        //return the records and display them in a table
        return Response::json([
            'result22'=>$request->all(),
            'table_products'=>$products->load('Supply1'),
        ]);
    }

    public function productsToDiscount(Request $request)
    {
        //the array that holds the id of the records
        $the_products=$request->input('products_to_discount');
        $productDetails=Product::find($the_products);

            return View::make('discount.assign_discount')->with('products', $productDetails);


    }
    public function newDiscount(Request $request){

       //save the discount via a loop
        $product_ids=$request->input('product_id');
        if ($product_ids==null){
            return redirect()->back()->withErrors(new MessageBag(['empty','No products are selected']));
        }

        //determine the type of products to save
        if ($request->input('discount_radio')==1) {
            foreach ($product_ids as $product_id) {
                //all products
                //get the product initial product price from the product table
                $product_1 = Product::find($product_id);
                $initial_product_price = $product_1->single_product_price_selling_price;
                $discount_1 = new Discount();
                $discount_1->product_id = $product_id;
                $discount_1->initial_product_selling_price = $initial_product_price;
                $discount_1->new_discounted_selling_price=$request->input('new_discounted_selling_price');
                $discount_1->discount_amount = $request->input('discount_amount');
                $discount_1->start_date = $request->input('start_date');
                $discount_1->end_date = $request->input('end_date');
                $discount_1->save();

                //save the has discount field in the product table
                $product2_1 = Product::find($product_id);
                $product2_1->has_discount = true;
                $product2_1->save();
            }
        }elseif ($request->input('discount_radio')==2){
            //products with no discount only
            foreach ($product_ids as $product_id) {
                //first determine if the product has no discount
                $data1=Product::find($product_id)->value('has_discount');

                if ($data1==false) {
                    //get the product initial product price from the product table
                    $product_2 = Product::find($product_id);
                    $initial_product_price = $product_2->single_product_price_selling_price;
                    $discount = new Discount();
                    $discount->product_id = $product_id;
                    $discount->initial_product_selling_price = $initial_product_price;
                    $discount->new_discounted_selling_price=$request->input('new_discounted_selling_price');
                    $discount->discount_amount = $request->input('discount_amount');
                    $discount->start_date = $request->input('start_date');
                    $discount->end_date = $request->input('end_date');
                    $discount->save();

                    //save the has discount field in the product table
                    $product2 = Product::find($product_id);
                    $product2->has_discount = true;
                    $product2->save();
                }
            }


        }elseif ($request->input('discount_radio')==3){
            //products with discount only


          foreach ($product_ids as $product_id) {
                //first get the products with discount
                $data2=Product::find($product_id);
                $data21=$data2->has_discount;
                //handles the error if there is no item that has a discount

                if ($data21==true) {
                    //get the product initial product price from the product table
                    $product = Product::find($product_id);
                    $initial_product_price = $product->single_product_price_selling_price;
                    $discount = new Discount();
                    $discount->product_id = $product_id;
                    $discount->initial_product_selling_price = $initial_product_price;
                    $discount->new_discounted_selling_price=$request->input('new_discounted_selling_price');
                    $discount->discount_amount = $request->input('discount_amount');
                    $discount->start_date = $request->input('start_date');
                    $discount->end_date = $request->input('end_date');
                    $discount->save();

                    //save the has discount field in the product table
                    $product2 = Product::find($product_id);
                    $product2->has_discount = true;
                    $product2->save();
                }


            }
//            return json_encode($data21);

        }else{
            return json_encode("Unknown Error");
        }


        return redirect('discounts');
    }

    public function displayActiveDiscount()
    {
        //get all the product names from the supplies table
        $supplies=Supply::all();
        return View::make('discount.active_discount')->with('supplies',$supplies);
    }

    public function displayProductDiscountTable(Request $request)
    {
        $product_id=$request->input('product_id_2_display_discount_table');
        $discounts=Discount::where('product_id','=',$product_id)
                            ->whereDate('end_date','>=',Carbon::today())->orderBy('created_at','desc')->get();


        //TODO remove the error that makes only one record appear always because of not passing the records that meet the condition
        return Response::json([
            'result33'=>$request->all(),
            'discounts'=>$discounts,
        ]);
    }

    public function deleteDiscount($discountId)
    {
        Discount::find($discountId)->delete();
       return redirect()->back();
    }

    public function editDiscount(Request $request)
    {
        $discountId=$request->input('discount_id');
        $discount_details=Discount::find($discountId);

        return Response::json([
            'result55'=>$request->all(),
            'discount_record'=>$discount_details,
        ]);
    }

    public function updateDiscount(Request $request)
    {
        $data5=Discount::find($request->input('discount_to_update_id'));
        $data5->discount_amount=$request->input('discount_amount');
        $data5->start_date=$request->input('start_date');
        $data5->end_date=$request->input('end_date');
        $data5->save();
        return redirect()->back();
    }
}
