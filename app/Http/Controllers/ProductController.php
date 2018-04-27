<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Supply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //get the supplier for the products for select2
        $suppliers=Supplier::all();
        //get the products for the table
        $products=Product::all();
        return View::make('products.products')
                    ->with('products',$products)
                    ->with('suppliers',$suppliers);
    }

    public function findSupplier(Request $request)
    {
        //get the supplies supplied by the supplier
        $supplies=Supply::where('supplier_id','=',$request->input('supplier_id_crap'))->get();
        return Response::json([
            'result11'=>$request->all(),
            'supplies'=>$supplies,
        ]);
    }

    public function newProduct(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'single_product_price_buying_price'=>'required|numeric',
            'single_product_price_selling_price'=>'required|numeric',
            'product_size'=>'required|numeric',
            'supplied_amount'=>'required|numeric'
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //save the new Product
        $product=new Product();
        $product->supplies_id=$request->input('supplies_id_for_product_name');
        $product->expiry_date=$request->input('expiry_date');
        $product->product_supplied_amount=$request->input('supplied_amount');
        $product->single_product_price_buying_price=$request->input('single_product_price_buying_price');
        $product->single_product_price_selling_price=$request->input('single_product_price_selling_price');
        $product->product_size=$request->input('product_size');
        //has discount and has expired are by default false in the database

        $product->save();

        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {
        Product::find($request->input('id_to_delete'))->delete();

        return redirect()->back();
    }

    public function productPrice(Request $request)
    {
        $supply=Supply::find($request->input('supplies_id_to_find_price'));

        return Response::json([
            'result44'=>$request->all(),
            'supply'=>$supply,
        ]);
    }

    public function exportProduct()
    {
        $products=Product::all()->toArray();
        return Excel::create('products'. Carbon::now(),function ($excel) use ($products){

            // Set the title
            $excel->setTitle('Products');

            $excel->sheet('products',function ($sheet) use ($products){
                $sheet->fromArray($products,null, 'A1', true);

            });
    })->download('xlsx');
    }

    public function importProducts(Request $request)
    {

        Validator::make($request->all(),[
            'import_file'=>'required',
        ])->validate();
        if ($request->hasFile('import_file')){
            $path=$request->file('import_file')->getRealPath();
            Excel::load($path,function ($reader){

        foreach ($reader->toArray() as $key=>$row){

            $data['supplies_id']=$row['supplies_id'];
            $data['product_supplied_amount']=$row['product_supplied_amount'];
            $data['expiry_date']=$row['expiry_date'];
            $data['single_product_price_buying_price']=$row['single_product_price_buying_price'];
            $data['single_product_price_selling_price']=$row['single_product_price_selling_price'];
            $data['product_size']=$row['product_size'];
            $data['has_discount']=$row['has_discount'];
            $data['has_expired']=$row['has_expired'];
            $data['created_at']=$row['created_at'];
            $data['updated_at']=$row['updated_at'];
            if (!empty($data)){
                DB::table('products')->insert($data);
            }
        }

            });
        return redirect()->back();
        }
    }
}
