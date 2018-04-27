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
                        <form action="{{url('records_to_give_discount')}}" method="post">
                            {{csrf_field()}}
                        {{--the point to include the table--}}
                        <table class="table table-striped table-responsive" id="table1">

                        {{--<table class="table table-striped table-responsive" id="table1">--}}
                            <thead>
                            <tr>

                                <th>Product Supplied Amount</th>
                                <th>Product Name</th>
                                <th>Expiry Date</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Has Discount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="t_body">
                            {{--<tr>--}}
                            {{--<td>hrhrhr</td>--}}
                            {{--<td>egegrerg</td>--}}
                            {{--<td>ergeger</td>--}}
                            {{--<td>ergergerg</td>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="discount_submitter_button" type="submit" >Add Discount</button>
                        </form>

                    </div>
                </div>


            </div>

            {{--<div class="col-md-6">--}}



                {{----}}
            {{--</div>--}}
        </div>
        <!--main content ends-->
    </section>
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
                                //assign each option value as the product id so thatwhen posting it you can get the supplies id and the product size to compare
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
            //use the supplies id to display all the products this similar supplies id
            var url22='{{url('product_to_display_table')}}';
            axios.post(url22,{'product_id_2_display_table':product_id})
                .then(function (result22) {
                    //clears the content in the table before starting
                       table.clear()
                        .draw();
                       //loops through each array adding each in each row
                    $.each(result22.data.table_products,function (key,shit) {
                        //get the product name
                        var input="<th>"+"<input type='hidden' name='products_to_discount["+shit.id+"]' value='"+shit.id+ "'/>"+"</th> ";
                       var discount_status;
                        if (shit.has_discount==true){
                            discount_status="<th>"+"<span class='label label-sm label-danger'>Has Discount</span>"+"</th>";

                        }else {
                             discount_status="<th>"+"<span class='label label-sm label-info'>No Discount</span>"+"</th>";

                        }
//                        shit.has_discount
                                table.row.add([shit.product_supplied_amount,shit.supply1.product_name,shit.expiry_date,shit.single_product_price_buying_price,shit.single_product_price_selling_price,discount_status,input]);

                    });
                    //displays the data in the page
                    table.draw();
                });
        }
    function submitRecordsToAddDiscount() {
//        $('#discount_submitter_button')

    }
    </script>
    <script type="text/javascript">


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