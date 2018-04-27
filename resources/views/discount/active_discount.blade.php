@extends('layouts.main')
@section('style')
    <link href="{{asset('template/vendors/daterangepicker/css/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!--select css-->
    <link href="{{asset('template/vendors/select2/select2.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('template/vendors/select2/select2-bootstrap.css')}}" />
    <!--clock face css-->
    <link href="{{asset('template/vendors/iCheck/skins/all.css')}}" rel="stylesheet" />
    <link href="{{asset('template/css/pages/formelements.css')}}" rel="stylesheet" />
    {{--table--}}
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Advanced Form Elements
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">
                Advanced Form Elements
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <!--select2 starts-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Select the Product to add discount
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <div class="form-group col-md-6" >
                            <label for="product_name" class="control-label">
                                Product Name
                            </label>
                            <select id="product_name" class="form-control select2" onchange="getProducts(this.value)">
                                <option selected disabled>Select a Product Name first</option>
                                @foreach($supplies as $supply)
                                    <option value="{{$supply->id}}">{{$supply->product_name}}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div id="product_size_div">
                                <label for="product_size_select2" class="control-label">
                                    Product Size
                                </label>
                                <select id="product_size_select2" class="form-control select2" onchange="passDataToDisplayTable(this.value)">

                                </select>

                            </div>
                        </div>
                        <!--ends-->
                    </div>
                </div>
                <!--select2 ends-->
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
                    <div class="panel-body" id="products_to_be_selected">

                            {{--the point to include the table--}}
                            <table class="table table-striped table-responsive" id="table1">

                                {{--<table class="table table-striped table-responsive" id="table1">--}}
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Initial Selling Price</th>
                                    <th>Discount Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody id="t_body">

                                </tbody>
                            </table>
                        {{--<div class="col-md-12">--}}
                            <div class="col-md-6">
                                <label for="total_discount">Total Discount</label>
                        <input class="form-control" id="total_discount">
                            </div>
                            <div class="col-md-6">
                                <label for="current_selling_price">Current Selling Price</label>
                        <input class="form-control" id="current_selling_price">
                            </div>
                        {{--</div>--}}
                    </div>
                </div>


            </div>

        </div>
        <!--main content ends-->
    </section>

    {{--edit existing modal--}}
    <div class="modal fade in" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Discount</h4>
                </div>
                <form action="{{url('update_discount')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                @if(count($errors)>0)


                                @endif
                            </div>
                            <input id="discount_to_update_id" name="discount_to_update_id" type="hidden">
                            <div class="col-md-6">


                                <p>
                                    <label for="discount_amount_input">Discount Amount</label>

                                    <input id="discount_amount_input" name="discount_amount" type="number" value="{{old('discount_amount')}}" class="form-control" required>
                                </p>

                                <p>
                                    <label for="start_date_input">Start Date</label>

                                    <input id="start_date_input" name="start_date" type="date" value="{{old('start_date')}}" class="form-control" required>
                                </p>
                            </div>
                            <div class="col-md-6">

                                <p>
                                    <label for="end_date_input">End Date</label>

                                    <input id="end_date_input" name="end_date" type="date"  value="{{old('end_date')}}" class="form-control" required>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Update Discount</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    {{--table--}}
    <script type="text/javascript" src="{{asset('template/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript">
        //hide the product size by default when the page is loaded
        $('#product_size_div').hide();
        function getProducts(supply_id) {
            //clear the input tags
            $('#total_discount').val(0);
            $('#current_selling_price').val(0);
            //clears the content in the table before starting
            table.clear()
                .draw();

            //display the product size once the user selects a product name
            $('#product_size_div').show();
            $('#product_size_select2').empty();


            //post the record that has been selected from the supplies table
            var url11='{{url('get_product_size_for_product_name')}}';
            axios.post(url11,{'supply_id_for_product_size':supply_id})
                .then(function (result11) {
//                    alert(result11.data.product_size.id);
                    $('#product_size_select2').append("<option disabled selected >Select Product Size</option>");
                    $.each(result11.data.product_size,function (key,value) {

                        //try to post the id of the supplies id then receive the unit name directly
                        var url112='{{url('doing_crazy_shit')}}';
                        axios.post(url112,{'crazy_supplies_id':value.supplies_id})
                            .then(function (result112) {
                                //assign each option value as the product id so that when posting it you can get the supplies id and the product size to compare
                                $('#product_size_select2').append("<option   value='" + value.id + "'>" + value.product_size + " " + result112.data.unit.unit_name+  "</option>")

                            });

                    })
                });

        }

        //prepares the table before starting
        var table = $('#table1').DataTable({
            "pageLength": 10
        });
        function passDataToDisplayTable(product_id) {
            //display the tabl showing the discounts of the selected product
            var url22='{{url('product_active_discount_table')}}';
            axios.post(url22,{'product_id_2_display_discount_table':product_id})
                .then(function (result33) {
                    //clears the content in the table before starting
                    table.clear()
                        .draw();
                    //compute the total discount
                    var total_discount=0;
                    var initial_selling_price=0;
                    //loops through each array adding each in each row
                    $.each(result33.data.discounts,function (key,shit) {
                        //delete column
                        var uru='{{url('delete_discount')}}';
                        var urur='{{url('edit_discount')}}';
                        var deleter="<th>"+"<a href='"+uru+"/"+shit.id+"'>Delete</a>"+"</th> ";
                        var editer="<th>"+"<a href='#' onclick='getEditDetails("+shit.id+")' data-toggle='modal' data-target='#edit_modal'>Edit</a>"+"</th> ";

                        total_discount=total_discount+shit.discount_amount;
                        initial_selling_price=shit.initial_product_selling_price;
                        table.row.add([shit.product_id,shit.initial_product_selling_price,shit.discount_amount,shit.start_date,shit.end_date,deleter,editer]);

                    });
                    //displays the data in the page
                    table.draw();
                    //display the total discount and the total selling price of the product
                    $('#total_discount').val(total_discount);
                    var current_price=initial_selling_price-total_discount;
                    $('#current_selling_price').val(current_price);
                });
        }
    </script>
    <script type="text/javascript">

    function getEditDetails(discount_id) {
        var url44='{{url('get_discount_to_edit')}}';
        axios.post(url44,{'discount_id':discount_id})
            .then(function (result55) {
//                alert(result55.data.discount_amount);
                $('#discount_amount_input').val(result55.data.discount_record.discount_amount);
                $('#start_date_input').val(result55.data.discount_record.start_date);
                $('#end_date_input').val(result55.data.discount_record.end_date);
                $('#discount_to_update_id').val(result55.data.discount_record.id);
            });

    }
    </script>
    <script src="{{asset('template/vendors/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/input-mask/jquery.inputmask.date.extensions.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="{{asset('template/vendors/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/select2/select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/iCheck/icheck.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/iCheck/demo/js/custom.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/autogrow/js/jQuery-autogrow.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/card/jquery.card.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/pages/formelements.js')}}" type="text/javascript"></script>


    {{--    <script type="text/javascript" src="{{asset('template/js/pages/table-advanced.js')}}"></script>--}}
@endsection