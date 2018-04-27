@extends('layouts.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">

    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />
    <style type="text/css">
        /*table{*/
            /*border: 1px black;*/
        /*}*/
    </style>
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
                                Discount
                            </div>

                        </div>
                        <div class="tools pull-right"></div>

                    </div>
                    <form role="form" method="post" action="{{url('add_new_discount')}}">
                        {{csrf_field()}}
                    <div class="panel-body">
                        <div class="col-md-12">
                            <!--md-6 starts-->
                            <!--form control starts-->
                            <div class="panel panel-success" id="hidepanel6">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="share" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                        Add discount
                                    </h3>
                                    <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                                </div>
                                <div class="panel-body">

                                        <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="new_discounted_selling_price">New Discounted Selling Price</label>
                                            <input type="number"  class="form-control" name="new_discounted_selling_price" id="new_discounted_selling_price" max="{{$products->first()->single_product_price_selling_price}}">
                                            <input type="hidden" id="the_current_selling_price" value="{{$products->first()->single_product_price_selling_price}}">
                                            <input type="hidden" name="discount_amount"  id="discount_amount" required >
                                            <p class="help-block">Enter the Amount that will be the discount</p>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="start_date">Start Date</label>
                                            <input class="form-control" type="date" name="start_date" id="start_date" value="{{old('start_date')}}" required>
                                            <p class="help-block">Enter the Start Date for the Discount</p>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="end_date">End Date</label>
                                            <input class="form-control"  type="date" name="end_date" id="end_date"  value="{{old('end_date')}}" required>
                                            <p class="help-block">Enter the End Date for the Discount</p>
                                        </div>

                                    <div class="form-group col-md-12">
                                        <label>Select the Products to Assign Discount</label>
                                        <div class="radio" >
                                            <label>
                                                <input type="radio" name="discount_radio" id="optionsRadios1" value="1" required>Apply Discount to all The Products</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="discount_radio" id="optionsRadios2" value="2" required> Apply Discount to the Products with <b>No discount Only</b></label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="discount_radio" id="optionsRadios3" value="3" required>Apply Discount to the products with <b> Discount Only</b></label>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="col-md-12">
                                        <button type="submit" class="btn btn-responsive btn-success pull-left" onclick="getDiscount()">Submit Button</button>
                                        <button type="reset" class="btn btn-responsive btn-primary pull-right">Reset Button</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">


                        {{--@foreach($errors->all as $error)--}}

                            {{--<li> {{$error}}</li>--}}

                        {{--@endforeach--}}
                        <hr>

                        <div >
                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                            <tr>

                                <th> Product Name</th>
                                <th> Single Product Price BP</th>
                                <th>Single product Price SP</th>
                                <th>
                                    Product Size
                                </th>
                                <th>Current Discount</th>
                                <th>Expiry Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>

                                    <td>{{$product->supply->first()->product_name}}</td>
                                    <td>{{$product->single_product_price_buying_price}}</td>
                                    <td>{{$product->single_product_price_selling_price}}</td>
                                    <td>{{$product->product_size . $product->supply->first()->unit->unit_name}}</td>
                                    <td>
                                        @if($product->has_discount==false)
                                            <span class="label label-sm label-success">No Discount</span>

                                        @else
                                            <span class="label label-sm label-danger">Has Discount</span>

                                        @endif
                                    </td>
                                    <td>{{$product->expiry_date}}</td>
                                    <td><input type="hidden" name="product_id[{{$product->id}}]" value="{{$product->id}}"></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- row-->


    </section>


@endsection

@section('script')

    <script type="text/javascript">


    </script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/pages/table-advanced.js')}}"></script>

    {{--modal--}}
    <script src="{{asset('template/vendors/modal/js/classie.js')}}"></script>
    <script src="{{asset('template/vendors/modal/js/modalEffects.js')}}"></script>
    <script type="text/javascript">
        function getDiscount() {
            var current_sp=$('#the_current_selling_price').val();
            var new_sp=$('#new_discounted_selling_price').val();
            var discount=current_sp-new_sp;
           $('#discount_amount').val(discount);
        }
    </script>
@endsection