@extends('layouts.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">

    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />
    <style type="text/css">
        #table1 td:hover {
            cursor: pointer;
        }
        #table1 #table_row:hover {
            background-color: rosybrown;
        }
    </style>
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
                            Search For Product
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                            <p class="col-md-4">
                                <label for="column1_search">Search For Product Using Purchase Code</label>
                                <input class="form-control" type="text" id="column1_search">
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

                                <th> Purchase Code</th>

                                <th>
                                    Payment Type
                                </th>
                                <th>Total Cost</th>
                                <th> Amount Paid</th>
                                <th> Invoice</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr onclick="openModal('{{$payment->id}}','{{$payment->purchase_code}}')" id="table_row" >
                                {{--<tr onclick="openModal({{$payment->purchase_code}})" id="table_row" data-toggle="modal" data-target="#responsive">--}}
                                    <td>{{$payment->purchase_code}}</td>
                                    <td>{{$payment->payment_type}}</td>
                                    <td>{{$payment->total_cost}}</td>
                                    <td>{{$payment->amount_paid}}</td>
                                    <td><span class="btn btn-success" > View Invoice</span></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- row-->

        <!-- Third Basic Table Ends Here-->
        <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Responsive</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Some More data</h4>
                                <p>
                                    <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name1" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name2" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name3" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name4" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name5" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4>Some More data</h4>
                                <p>
                                    <input id="name6" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name7" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name8" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name9" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name10" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                                <p>
                                    <input id="name41" name="name" type="text" placeholder="Your name" class="form-control">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.modal ends here -->
    </section>




@endsection

@section('script')

    {{--<script type="text/javascript" src="{{asset('template/vendors/datatables/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script type="application/javascript">--}}
        {{--$(document).ready(function(){--}}
            {{--$('#table1').DataTable();--}}
        {{--});--}}
     {{--</script>--}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/pages/table-advanced.js')}}"></script>
<script type="application/javascript">
    var table = $('#table1').DataTable();

    // #column3_search is a <input type="text"> element
    $('#column1_search').on( 'keyup', function () {
    table
    .columns( 0 )
    .search( this.value )
    .draw();
    } );
    </script>

    <script type="application/javascript">

        function openModal(payment_id,purchase_code) {

           window.location='{{url('open_invoice_from_payments_view')}}'+'/'+payment_id+'/'+purchase_code;
        }
    </script>
    {{--modal--}}
    <script src="{{asset('template/vendors/modal/js/classie.js')}}"></script>
    <script src="{{asset('template/vendors/modal/js/modalEffects.js')}}"></script>
@endsection