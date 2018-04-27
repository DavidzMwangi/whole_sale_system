<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
    //
    public function displayPaymentView($purchase_code)
    {
        //get the records
        $purchases=Purchase::where('purchase_code',$purchase_code)->get();
        $costs=Purchase::where('purchase_code',$purchase_code)->sum('purchase_total_cost');
        //get the total cost of the purchases
        return View::make('payments.new_payment')
                    ->with('purchases',$purchases)
                    ->with('full_cost',$costs);
    }

    public function newPayment(Request $request)
    {
        Validator::make($request->all(),[
            'purchase_code'=>'required',
            'total_full_cost'=>'required',
            'payment_type'=>'required',
            'amount_paid'=>'required|numeric',
        ])->validate();

        //ensure that a payment is not saved twice
        $existing_payment=Payment::where('purchase_code',$request->purchase_code)->get();
        if (count($existing_payment)>=1){
            return redirect('existing_purchases');
        }

        $payment=new Payment();
        $payment->purchase_code=$request->input('purchase_code');
        $payment->payment_type=$request->input('payment_type');
        $payment->total_cost=$request->input('total_full_cost');
        $payment->amount_paid=$request->input('amount_paid');
        $payment->save();

        //get the record with similar purchase code from the purchase table
        $purchases=Purchase::where('purchase_code',$request->input('purchase_code'))->get();

        foreach ($purchases as $purchase){
            //get the product details from product table using the supplies id
         $products=Product::where('supplies_id',$purchase->supply_id)->orderBy('expiry_date','asc')->get();
        //loop through each subtracting the amount until its zero
            $single_purchased_amount=$purchase->purchased_amount;

            foreach ($products as $product){

                if($product->product_supplied_amount==0){
                    //do nothing
                }
               else if ($product->product_supplied_amount<$purchase->purchased_amount){
                    //update the single purchased amount
                   $single_purchased_amount=$single_purchased_amount-$product->product_supplied_amount;

                    //change the product supplied amount to 0
                    $product->product_supplied_amount=0;
                    $product->save();
                }else{

                    $product->product_supplied_amount=$product->product_supplied_amount-$single_purchased_amount;
                    $product->save();
                }
            }

            $purchase->is_paid=true;
            $purchase->save();
        }

        //get the purchase records with the same purchase code
        $purchases=Purchase::where('purchase_code',$request->input('purchase_code'))->get();

        //get the payment record just saved
        $saved_payment=Payment::find($payment->id);
        return View::make('payments.payment_invoice')
                    ->with('payment',$saved_payment)
                    ->with('purchases',$purchases);
    }

    public function existingPayment()
    {

        $payments=Payment::select('id','purchase_code','payment_type','total_cost','amount_paid')->groupBy('purchase_code','id','payment_type','total_cost','amount_paid')->get();
        return View::make('payments.existing_payments')->with('payments',$payments);
    }

    public function openInvoiceFromExistingPayment($payment_id,$purchase_code)
    {
        $purchases=Purchase::where('purchase_code',$purchase_code)->get();
        $payment=Payment::find($payment_id);
        return View::make('payments.payment_invoice')
            ->with('payment',$payment)
            ->with('purchases',$purchases);
    }

    public function openRealInvoice($paymentId,$purchase_code)
    {
        $purchases=Purchase::where('purchase_code',$purchase_code)->get();
        $payment=Payment::find($paymentId);
        return View::make('payments.invoice')
            ->with('payment',$payment)
            ->with('purchases',$purchases);
    }

    public function downloadPdf($paymentId,$purchaseCode)
    {
        $purchases=Purchase::where('purchase_code',$purchaseCode)->get();
        $payment=Payment::find($paymentId);
        $pdf = PDF::loadView('payments.invoice', ['purchases'=>$purchases,'payment'=>$payment]);
        return $pdf->download('invoice.pdf');

    }
}

