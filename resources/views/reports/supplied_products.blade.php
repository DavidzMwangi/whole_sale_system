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
        <h1>Supplied Products Report</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">Reports</a>
            </li>
            <li class="active">Supplied Products</li>
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
                        {{--<p class="col-md-4">--}}
                            {{--<label for="column_names">Select column to Search By</label>--}}
                            {{--<select name="column_names" class="form-control" id="column_names" onchange="showParagraph(this.value)" >--}}
                               {{--<option selected disabled></option>--}}
                                {{--<option value="0">Product Name</option>--}}
                                {{--<option value="1"> Supplier Name</option>--}}

                                {{--<option value="2">Supplier Phone No</option>--}}
                                {{--<option value="3">Supplier Company name</option>--}}
                                {{--<option value="4"> Single Product Buying Price</option>--}}
                                {{--<option value="5"> Product Amount</option>--}}
                            {{--</select>--}}
                        {{--</p>--}}
                        <p class="col-md-4" id="search_value_p" >
                            <label for="column1_search">Enter Supplier Name</label>
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
                                Products
                            </div>

                        </div>
                        <div class="tools pull-right"></div>

                    </div>
                    <div class="panel-body">



                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th> Supplier Name</th>

                                <th>Supplier Phone No</th>
                                <th>Supplier Company name</th>
                                <th> Single Product Buying Price</th>
                                <th> Product Amount</th>
                                <th> Has Discount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->supply->product_name}}</td>
                                    <td>{{$product->supply->supplier->supplier_name}}</td>
                                    <td>{{$product->supply->supplier->supplier_phone_no}}</td>
                                    <td>{{$product->supply->supplier->supplier_company_name}}</td>
                                    <td>{{$product->single_product_price_buying_price}}</td>
                                    <td>{{$product->product_size}}</td>
                                    <td>@if($product->has_discount==0)
                                            <span class="btn btn-danger" >No</span>
                                                @else
                                            <span class="btn btn-success" >Yes</span>
                                                    @endif
                                      </td>
                                    {{--<td><span class="btn btn-success" > View Invoice</span></td>--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- row-->


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

        // function showParagraph(columnIndex) {
        //
        //     $('#search_value_p').show();
        //     $('#column1_search').clear();
        //     // #column3_search is a <input type="text"> element
        //
        // }
        $('#column1_search').on( 'keyup', function () {
            table
                .columns( 1 )
                .search( this.value )
                .draw();
        } );
    </script>

    <script type="application/javascript">

    </script>
    {{--modal--}}
    <script src="{{asset('template/vendors/modal/js/classie.js')}}"></script>
    <script src="{{asset('template/vendors/modal/js/modalEffects.js')}}"></script>
@endsection