<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class BuyerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $buyers=Buyer::all();
        return View::make('buyers.all_buyers')
            ->with('buyers',$buyers);
    }

    public function newBuyer(Request $request)
    {
        $buyer=new Buyer();
        $buyer->buyer_name=$request->input('buyer_name');
        $buyer->buyer_company_name=$request->input('buyer_company_name');
        $buyer->buyer_type=$request->input('buyer_type');
        $buyer->email=$request->input('buyer_email');
        if ($request->has('is_loyal_customer')){
            $buyer->is_loyal_customer=true;
        }else{
            $buyer->is_loyal_customer=false;
        }
        $buyer->save();
        return redirect()->back();

    }

    public function deleteBuyer(Request $request)
    {
        Buyer::find($request->input('id_to_delete'))->delete();
        return redirect()->back();
    }

    public function editBuyer(Request $request)
    {
        $buyer=Buyer::find($request->input('buyer_id'));
        return Response::json([
            'result33'=>$request->all(),
            'buyer'=>$buyer
        ]);
    }
}
