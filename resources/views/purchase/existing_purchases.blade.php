@extends('layouts.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">

    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />

@endsection

@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Advanced Datatables</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">DataTables</a>
            </li>
            <li class="active">Advanced Datatables</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading clearfix  ">
                        <div class="panel-title pull-left">
                            <div class="caption">
                                <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                TableTools
                            </div>

                        </div>
                        <div class="tools pull-right"></div>

                    </div>
                    <div class="panel-body">


                        @if(count($errors)>0)


                        @endif
                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                            <tr>

                                <th> Purchase Code</th>

                                <th>
                                   Payment Status
                                </th>
                                <th>Payment</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchases as $purchase)
                                <tr>

                                    <td>{{$purchase->purchase_code}}</td>


                                    <td>
                                        @if($purchase->is_paid==true)
                                            <span class="label label-sm label-success">Paid</span>
                                            @else
                                            <span class="label label-sm label-danger">Not Paid</span>
                                            @endif
                                    </td>
                                    <td>
                                        @if($purchase->is_paid==true)
                                            <span class="label label-sm label-success">Complete</span>
                                        @else
                                        <a href="{{url('make_payment_from_purchase/' . $purchase->purchase_code)}}" class="btn btn-primary">Make The Payment</a>
                                        @endif

                                    </td>
                                    <td>
                                        @if($purchase->is_paid==true)

                                            @else
                                        <a href="{{url('delete_purchase/'. $purchase->purchase_code)}}" class="btn btn-danger">Delete Purchase</a>
                                        @endif

                                    </td>

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
        <!--delete modal starts here-->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">
                            Delete this entry
                        </h4>
                    </div>
                    <form action="{{url('delete_supplier')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <input id="selected_id" name="id_to_delete" type="hidden">
                            <div class="alert alert-warning">
                                <span class="glyphicon glyphicon-warning-sign"></span>
                                Are you sure you want to delete this Record?
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-warning" onclick="deleteUser()">
                                <span class="glyphicon glyphicon-ok-sign"></span>
                                Yes
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal" >
                                <span class="glyphicon glyphicon-remove"></span>
                                No
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal ends here -->
    </section>




@endsection

@section('script')

    <script type="text/javascript" src="{{asset('template/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/pages/table-advanced.js')}}"></script>

    {{--modal--}}
    <script src="{{asset('template/vendors/modal/js/classie.js')}}"></script>
    <script src="{{asset('template/vendors/modal/js/modalEffects.js')}}"></script>
@endsection