<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {

        //get the purchases first
        $total_purchases=count(Purchase::all());
        $paid_purchases=count(Purchase::where('is_paid',true)->get());
        if($paid_purchases!=0){
            $paid_purchases_percentage=($paid_purchases/$total_purchases)*100;

        }else{
            $paid_purchases_percentage=0;
        }

        //get the percentage purchases for a whole year
        $year_purchases[]=12;
        $year_products[]=12;
        $a =1;
        $year=date('Y');
        while($a<=12){
            $year_purchases[$a]=count(Purchase::whereYear('created_at',$year)->whereMonth('created_at',$a)->get());
            $year_products[$a]=count(Product::whereYear('created_at',$year)->whereMonth('created_at',$a)->get());

            $a++;
        }

        return View::make('dashboard.dashboard')
            ->with('paid_purchases_percentage',$paid_purchases_percentage)
            ->with('month_purchases',$year_purchases)
            ->with('month_products',$year_products);
    }
}
