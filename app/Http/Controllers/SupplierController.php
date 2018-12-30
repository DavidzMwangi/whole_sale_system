<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class SupplierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        $suppliers=Supplier::all();
       return View::make('suppliers.all_suppliers')->with('suppliers',$suppliers);
    }

    public function newSupplier(Request $request){
        $supplier=new Supplier();
        $supplier->supplier_name=$request->input('supplier_name');
        $supplier->supplier_phone_no=$request->input('supplier_phone_no');
        $supplier->supplier_company_name=$request->input('supplier_company_name');
        $supplier->email=$request->input('supplier_email');
        $supplier->save();

        return redirect()->back();
    }

    public function getDetails(Request $request)
    {
       $supplier=Supplier::find($request->input('supplier_for_editting_id'));
       return Response::json([
           'result24'=>$request->all(),
           'supplier'=>$supplier,
       ]);
    }

    public function edittedSupplier(Request $request)
    {
        //get the record
        $supplier=Supplier::find($request->input('edit_supplier_id'));
        $supplier->supplier_name=$request->input('edit_supplier_name');
        $supplier->supplier_phone_no=$request->input('edit_supplier_phone_no');
        $supplier->supplier_company_name=$request->input('edit_supplier_company_name');
        $supplier->email=$request->input('edit_supplier_email');
        $supplier->save();
        return redirect()->back();
    }

    public function deleteSupplier(Request $request)
    {
        Supplier::find($request->input('id_to_delete'))->delete();
        return redirect()->back();
    }
}
