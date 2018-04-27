<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WholeSale System</title>
    {{--<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>--}}
    <link rel="shortcut icon" href="{{asset('uploads/company_profile/profile.png')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{asset('template/vendors/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/css/styles/black.css')}}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{asset('template/css/panel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('template/css/metisMenu.css')}}" rel="stylesheet" type="text/css"/>
    <!-- end of global css -->
{{--local css--}}
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/vendors/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/css/styles/black.css')}}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{asset('template/css/panel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('template/css/metisMenu.css')}}" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            .float{
                position:fixed;
                width:100px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color:#0C9;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

            .my-float{
                margin-top:22px;
            }
            .float1{
                position:fixed;
                width:100px;
                height:60px;
                bottom:40px;
                left:40px;
                background-color:#0C9;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

        </style>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
{{--end of local css--}}
<!--end of page level css-->
</head>

<body class="skin-josh">

<div class="wrapper row-offcanvas row-offcanvas-left">

        <section class="content paddingleft_right15">
            <br><br>
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
                            <div class="page-break"></div>

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
                            <div class="page-break"></div>

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
                            <div class="page-break"></div>

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
                                        <br>
                                        <br></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-break"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <strong>Order summary</strong>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
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

                    </div>
                </div>
            </div>
        </section>
    <a href="{{url('existing_payments')}}"  class="float1">
        <br>
        <strong class="my-float">Back</strong>
    </a>
    <a href="{{url('download_purchase_pdf/'.$payment->id.'/'.$purchases->first()->purchase_code)}}"  class="float">
        <br>
        <strong class="my-float">Download Pdf</strong>
        {{--<i class="fa fa-plus my-float"></i>--}}
    </a>
</div>
{{--<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">--}}
    {{--<i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>--}}
{{--</a>--}}
<!-- global js -->
<script src="{{asset('template/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!--livicons-->
<script src="{{asset('template/vendors/livicons/minified/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/vendors/livicons/minified/livicons-1.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/josh.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/metisMenu.js')}}" type="text/javascript"> </script>
<script src="{{asset('template/vendors/holder-master/holder.js')}}" type="text/javascript"></script>
<!-- end of global js -->
<!-- begining of page level js -->
<script src="{{asset('js/axios.min.js')}}" type="text/javascript"></script>

<!--  todolist-->

<!-- end of page level js -->
{{--local js--}}
<script src="{{asset('template/vendors/livicons/minified/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/vendors/livicons/minified/livicons-1.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/josh.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/metisMenu.js')}}" type="text/javascript"> </script>
<script src="{{asset('template/vendors/holder-master/holder.js')}}" type="text/javascript"></script>
{{--end of local css--}}
</body>
</html>
