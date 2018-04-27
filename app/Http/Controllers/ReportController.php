<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    //
    public function paymentReport()
    {
        return View::make('reports.purchases');
    }

    public function filteredPurchases(Request $request)
    {
        $start_date=Carbon::createFromFormat("m-d-Y",$request->input('start_date'));
        $end_date=Carbon::createFromFormat("m-d-Y",$request->input('end_date'));

        $purchases=Purchase::whereBetween('created_at',[$start_date,$end_date])->get();
        return Response::json([
            'result1'=>$request->all(),
            'purchases'=>$purchases->load(['buyer','supply']),
        ]);
    }

    public function suppliedProductsReport()
    {
        $products=Product::all();
        return View::make('reports.supplied_products')->with('products',$products);
    }
}
