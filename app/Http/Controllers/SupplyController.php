<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Supply;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;

class SupplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        //display all the supplies to be displayed in the table
        $supplies=Supply::all();

        //get all the suppliers name
        $suppliers=Supplier::all();

        //get all the existing unit types
        $units=Unit::all();
        return View::make('supplies.all_supplies')
                    ->with('supplies',$supplies)
                    ->with('suppliers',$suppliers)
                    ->with('units',$units);
    }

    public function newSupply(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'single_product_price'=>'required|numeric',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //create a new supply
        $supply=new Supply();
        $supply->supplier_id=$request->input('supplier_name');
        $supply->product_name=$request->input('product_name');
        $supply->single_product_price=$request->input('single_product_price');
        $supply->unit_id=$request->input('unit_type');
        if ($request->input('tax_percentage')==null){
            $supply->tax_percentage=null;
        }else{
            $supply->tax_percentage=$request->input('tax_percentage');
        }
        $supply->save();
        return redirect()->back();
    }

    public function getSupplyDetails(Request $request)
    {
        $supply=Supply::find($request->input('supply_for_editting_id'));
        $units=Unit::all();
        return Response::json([
            'result25'=>$request->all(),
            'supplies99'=>$supply->load('Supplier'),
            'units'=>$units,
        ]);
    }

    public function deleteSupply(Request $request)
    {
        Supply::find($request->input('id_to_delete'))->delete();
        return redirect()->back();
    }

    public function editSupply(Request $request)
    {
        //get the record to edit
        $supply=Supply::find($request->input('selected_supply_to_edit'));
        $supply->supplier_id=$request->input('edit_supplier_name');
        $supply->product_name=$request->input('edit_product_name');
        $supply->single_product_price=$request->input('edit_single_product_price');
        $supply->unit_id=$request->input('edit_unit_type');
        $supply->tax_percentage=$request->input('tax_percentage_edit');
        $supply->save();

        return redirect()->back();
    }
}
