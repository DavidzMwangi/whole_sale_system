@extends('layouts.main')
@section('style')

    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />
    <link href="{{asset('template/vendors/daterangepicker/css/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Existing Payments</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">Payments</a>
            </li>
            <li class="active">Existing Payments</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                           Purchase Report
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <p class="col-md-6">
                            <label for="daterange">Pick Date Range</label>
                            <button class="btn btn-default " id="daterange-btn" onclick="openLoader()">
                                <i class="fa fa-calendar"></i>
                                Date range picker
                                <i class="fa fa-caret-down"></i>
                            </button>

                        </p>

                        <!-- BEGIN modal-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading clearfix  ">
                        <div class="panel-title pull-left">
                            <div class="caption">
                                <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Payments
                            </div>

                        </div>
                        <div class="tools pull-right"></div>

                    </div>
                    <div class="panel-body">



                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                            <tr>

                                <th> Product Name</th>
                                <th>Buyer Name</th>
                                <th>
                                    Purchase Code
                                </th>
                                <th>Single Product Selling Price</th>
                                <th> Discount Amount</th>
                                <th> Purchased Amount</th>
                                <th> Purchase Total Cost</th>
                                <th> Payment</th>
                            </tr>
                            </thead>
                            <tbody id="table_row">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- row-->

        <!-- Third Basic Table Ends Here-->
        <!-- /.modal ends here -->
    </section>




@endsection

@section('script')

    <script type="text/javascript" src="{{asset('template/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('template/vendors/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>



    <script type="text/javascript">

        var table = $('#table1').DataTable({
            "pageLength": 10
        });
        function openLoader () {

            {{--$('#table1').append('<tbody id="new_body"><tr><td></td><td></td><td></td><td></td><td><img  src="{{asset('loader.gif')}}" /></td></tr></tbody>');--}}

        }
        $(document).ready(function () {
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        'Last 7 Days': [moment().subtract('days', 6), moment()],
                        'Last 30 Days': [moment().subtract('days', 29), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    startDate: moment().subtract('days', 29),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    var url='{{url('get_filtered_purchases')}}';
                    axios.post(url,{'start_date':start.format('MM-D-YYYY'),'end_date':end.format('MM-D-YYYY')})
                        .then(function (result1) {
                            $('#new_body').hide();
                            table.clear()
                                .draw();
                            $.each(result1.data.purchases,function (key,purchase) {
                                var paid;
                                if (purchase.is_paid==1){
                                    paid='<span class="label label-sm label-primary">Paid</span>';

                                }else {
                                    paid='<span class="label label-sm label-danger">UnPaid</span>';

                                }
                                table.row.add([purchase.supply.product_name,purchase.buyer.buyer_name,purchase.purchase_code,purchase.single_product_selling_price,purchase.discount_amount,purchase.purchased_amount,purchase.purchase_total_cost,paid]);

                            });
                            table.draw();
                        })
                        .catch(function (res) {
                            console.log(res);
                        })
                }
            );

        });



    </script>

    {{--modal--}}
    <script src="{{asset('template/vendors/modal/js/classie.js')}}"></script>
    <script src="{{asset('template/vendors/modal/js/modalEffects.js')}}"></script>
@endsection