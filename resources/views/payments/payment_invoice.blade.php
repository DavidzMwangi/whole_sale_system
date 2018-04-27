@extends('layouts.main')
@section('style')
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/vendors/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/css/styles/black.css')}}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{asset('template/css/panel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('template/css/metisMenu.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')
    <section class="content-header">
        <h1>Invoice</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Home
                </a>
            </li>
            <li class="active">Extra</li>
            <li class="active">Invoice</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                        Invoice for purchase code {{$payment->purchase_code}}
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12  col-sm-3 col-md-3 col-lg-3 pull-left">
                            <div class="panel panel-primary height">
                                <div class="panel-heading">Billing Details</div>
                                <div class="panel-body"> <b>{{$purchases->first()->buyer->buyer_name}}</b>
                                    <br>
                                    {{$purchases->first()->buyer->buyer_type}}
                                    <br>
                                   {{$purchases->first()->buyer->buyer_company_name}}
                                    <br>
                                    {{--VA--}}
                                    <br>
                                    {{--<strong>22 203</strong>--}}
                                    <br>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="panel panel-success height">
                                <div class="panel-heading">Payment Info</div>
                                <div class="panel-body" style="padding:15px 0px 55px 22px;">
                                    <strong>Payment Type:</strong>
                                    {{$payment->payment_type}}
                                    <br>
                                    <strong>Purchase Code:</strong>
                                    {{$payment->purchase_code}}
                                    <br>
                                    <strong>Creation Date</strong>
                                   {{$payment->created_at->toFormattedDateString()}}

                                    <br></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="panel panel-info height">
                                <div class="panel-heading hidden-sm">Purchase Offers</div>
                                <div class="panel-heading hidden-lg hidden-md hidden-xs">Order Pre</div>
                                <div class="panel-body" style="padding:15px 0px 36px 22px;">
                                    <strong>Total Discount:</strong>
                                    {{\App\Models\Purchase::where('purchase_code',$payment->purchase_code)->sum('discount_amount')}}
                                    <br>
                                    <strong> Delivery:</strong>
                                    Company Store
                                    <br>
                                    <strong>Insurance:</strong>
                                    No
                                    <br>
                                    <strong>Licensed</strong>
                                    Yes
                                    <br></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 pull-right">
                            <div class="panel panel-warning height">
                                <div class="panel-heading">More Details</div>
                                <div class="panel-body">
                                    <strong>Amount Paid: </strong>{{$payment->amount_paid}}

                                    <br>
                                    <strong>Total Cost: </strong>{{$payment->total_cost}}

                                    <br>
                                    <strong>Balance: </strong>{{$payment->amount_paid-$payment->total_cost}}
                                    <br>
                                    {{--VA--}}
                                    <br>
                                    {{--<strong>22 203</strong>--}}
                                    <br></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <strong>Order summary</strong>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed js-exportable">
                                        <thead>
                                        <tr>
                                            <td>
                                                <strong>Product Name</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong>Buyer Name</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong>Product Amount</strong>
                                            </td>
                                            {{--<td class="text-center">--}}
                                                {{--<strong>Discount</strong>--}}
                                            {{--</td>--}}
                                            <td class="text-right">
                                                <strong>Total Cost</strong>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($purchases as $purchase)

                                        <tr>
                                            <td >{{$purchase->supply->product_name}}</td>
                                            <td class="text-center">{{$purchase->buyer->buyer_name}}</td>
                                            <td class="text-center">{{$purchase->purchased_amount}}</td>
{{--                                            <td class="text-center">{{$purchase->discount_amount}}</td>--}}
                                            <td class="text-right">{{$purchase->purchase_total_cost}}</td>
                                        </tr>
                                        @endforeach


                                        <tr>
                                            <td class="highrow"></td>
                                            <td class="highrow"></td>
                                            <td class="highrow text-center">
                                                <strong>Sub Total</strong>
                                            </td>
                                            <td class="highrow text-right">{{$payment->total_cost}} Ksh</td>
                                        </tr>
                                        <tr>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-center">
                                                <strong>Other Charges</strong>
                                            </td>
                                            <td class="emptyrow text-right">0Ksh</td>
                                        </tr>
                                        <tr>
                                            <td class="emptyrow">
                                                {{--<i class="livicon" data-name="barcode" data-size="60" data-loop="true"></i>--}}
                                            </td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-center">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="emptyrow text-right">{{$payment->total_cost}} Ksh</td>
                                        </tr>


                                        <tr>
                                            <td class="emptyrow">
                                                {{--<i class="livicon" data-name="barcode" data-size="60" data-loop="true"></i>--}}
                                            </td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-center">
                                                <strong>Amount Paid</strong>
                                            </td>
                                            <td class="emptyrow text-right">{{$payment->amount_paid}} Ksh</td>
                                        </tr>


                                        <tr>
                                            <td class="emptyrow">
                                            </td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-center">
                                                <strong>Balance</strong>
                                            </td>
                                            <td class="emptyrow text-right">{{$payment->amount_paid-$payment->total_cost}} Ksh</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin:10px 20px;">
                        {{--<button type="button" class="btn btn-responsive button-alignment btn-info" data-toggle="button">--}}
                            <a style="color:#fff;" href="{{url('open_invoice/'.$payment->id .'/'.$purchases->first()->purchase_code)}}" class="btn btn-responsive button-alignment btn-primary">
                            {{--<a style="color:#fff;" onclick="javascript:window.print();">--}}
                                Generate Pdf
                                <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            </a>
                        {{--</button>--}}
                        {{--<button type="button" class="btn btn-responsive button-alignment btn-success" data-toggle="button">--}}
                            {{--<a style="color:#fff;">--}}
                                {{--Submit Your Invoice--}}
                                {{--<i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>--}}
                            {{--</a>--}}
                        {{--</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
@section('script')
    <script src="{{asset('template/vendors/livicons/minified/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/livicons/minified/livicons-1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/josh.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/metisMenu.js')}}" type="text/javascript"> </script>
    <script src="{{asset('template/vendors/holder-master/holder.js')}}" type="text/javascript"></script>
    @endsection