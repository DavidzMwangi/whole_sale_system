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
                        <form >
                        <div class="form-group col-md-6" >
                            <p>
                                <input type="hidden" id="purchase_code_for_last_complete_purchase" value="{{$latest_record_purchase_code}}">
                            <label for="product_name" class="control-label">
                                Product Name
                            </label>
                            <select id="product_name" class="form-control select2" onchange="getProducts(this.value)">
                                <option selected disabled>Select a Product Name first</option>
                                @foreach($supplies as $supply)
                                    <option value="{{$supply->id}}">{{$supply->product_name}}</option>
                                @endforeach


                            </select>
                            </p>
                            <div class="secondary_data">

                            <p>
                                <label for="product_amount" class="control-label">
                                    Product Amount
                                </label>
                                <input class="form-control" id="product_amount" name="product_amount" type="number" required >

                            </p>

                                <p>
                                    <label for="buyer_id" class="control-label">
                                       Buyer Name
                                    </label>
                                    <select id="buyer_id" name="buyer_id" class="form-control select2" onchange="calculateTotalPrice()">
                                        <option selected disabled>Select a Product Name first</option>
                                        @foreach($buyers as $buyer)
                                            <option value="{{$buyer->id}}">{{$buyer->buyer_name}}</option>
                                        @endforeach


                                    </select>
                                </p>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <p class="secondary_data">
                                <label for="product_size_select2" class="control-label">
                                    Product Size
                                </label>
                                <select id="product_size_select2" class="form-control select2" onchange="getProductInfo(this.value)">

                                </select>

                            </p>
                            <p class="secondary_data">
                                <label for="single_product_price" class="control-label">
                                    Initial Single Product Price
                                </label>
                                <input id="single_product_price" class="form-control" name="single_product_price" readonly>

                            </p>
                            <p class="secondary_data">
                                <label for="discounted_product_price" class="control-label">
                                    Discounted Single Product Price
                                </label>
                                <input id="discounted_product_price" class="form-control" name="discounted_product_price" readonly>

                            </p>
                            <p class="secondary_data">

                                <label for="product_total_price" class="control-label">
                                    Total Price
                                </label>
                                <input id="product_total_price" class="form-control" name="product_total_price" readonly>

                            </p>


                        </div>
                        <!--ends-->

                        <div class="footer col-md-12">
                            <button type="reset" class="btn btn-success" onclick="clearInputs()" id="add_row">Add Purchase</button>
                        </div>
                        </form>
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
                                <th>Select</th>
                                <th>Product Name</th>
                                <th>Product Purchased Amount</th>
                                <th>Product Initial Single Price</th>
                                <th>Product Discounted Single Price</th>
                                <th>Discount Amount</th>
                                <th>Total Cost</th>

                            </tr>
                            </thead>
                            <tbody id="t_body">

                            </tbody>
                        </table>
                        <div class="col-md-12">

                        <div class="col-md-6">
                        <button type="button" class="delete-row btn btn-primary">Delete Row</button>
                        </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success" onclick="makeThePayment()">Make the Purchase</button>

                            </div>
                        </div>

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

//       var  product_namer="kimoda";
        var inital_product_price;
        var discounted_price;
        var total_cost_j;
        var max_product_amount;
        window.current_purchase_code=0;
        $(document).ready(function(){
            $("#add_row").click(function(){
                //save the records first then display them
                var url56='{{url('save_purchase_before_display')}}';
                var supply_id_save= $("#product_name").val();
                var previous_purchase_code=$('#purchase_code_for_last_complete_purchase').val();
                var purchase_code_save=parseInt(previous_purchase_code)+1;
                current_purchase_code=purchase_code_save;
                var buyer_id_save=$('#buyer_id').val();
                var purchased_amount_save=$('#product_amount').val();
                var purchase_total_cost_save=$('#product_total_price').val();
                var single_product_selling_price_to_save;
                if(discounted_price=="") {
                   single_product_selling_price_to_save=$('#single_product_price').val();
                }else {
                    single_product_selling_price_to_save=discounted_price;
                }
                var discount_amount_save;
                var discount_99=discounted_price;
                if (discount_99==""){
                    discount_amount_save=0;
                }else{
                    discount_amount_save=($('#single_product_price').val())-(discounted_price);
                }

                axios.post(url56,{'supply_id_to_save': supply_id_save,'purchase_code_to_save':purchase_code_save,'buyer_id_to_save':buyer_id_save,'purchased_amount_to_save':purchased_amount_save,'purchase_total_cost_to_save':purchase_total_cost_save,'single_product_selling_price_to_save':single_product_selling_price_to_save,'discount_amount_to_save':discount_amount_save})
                    .then(function (result67) {
                    //get the records that have been saved and display them in the table


                        var product_amount_j = result67.data.saved_record.purchased_amount;
                        var discounted_selling_price_j;
                        if(discounted_price=="") {
                            discounted_selling_price_j=0;
                        }else {
                            discounted_selling_price_j = discounted_price;
                        }
                        var discounted_amount;
                        if (discounted_selling_price_j==""){
                            discounted_amount=0;
                        }else{
                            discounted_amount=inital_product_price-discounted_selling_price_j
                        }




                                 var markup = "<tr><td><input type='checkbox' name='record'></td>" +
                                    "<td>" +  result67.data.saved_record.supply.product_name + "</td>" +
                                    "<td>" + product_amount_j + "</td>" +
                                    "<td>" + inital_product_price + "</td>" +
                                    "<td>" + discounted_selling_price_j + "</td>" +
                                    "<td>" + discounted_amount + "</td>" +
                                    "<td>" + total_cost_j + "</td>" +
                                    "</tr>";
                                $("table tbody").append(markup);
//                            });


                    });

            });

            // Find and remove selected table rows
            $(".delete-row").click(function(){
                $("table tbody").find('input[name="record"]').each(function(index, value){
                    if($(this).is(":checked")){
                        var a=$(value).val();
                        //get the purchase code of the purchase: current_purchase_code
                        //index number for the record selected
                        var url904='{{url('get_purchase_to_delete')}}';
                        axios.post(url904,{'current_purchase_code':current_purchase_code,'index_for_selected_purchase':index})
                            .then(function (result56) {

                            });


                        $(this).parents("tr").remove();
                    }
                });
            });
        });

        function makeThePayment() {
            var a='{{url('make_payment_from_purchase/')}}';
            window.location=a+'/'+current_purchase_code
        }
    </script>

    <script type="text/javascript">
        function clearInputs() {
            $('#single_product_price').empty();
            $('#discounted_product_price').empty();
            $('#product_total_price').empty();


        }
        //hide the product size by default when the page is loaded
        $('.secondary_data').hide();
        function getProducts(supply_id) {
            //clear the input tags
            $('#total_discount').val(0);
            $('#current_selling_price').val(0);
            //clears the content in the table before starting
//            table.clear()
//                .draw();

            //display the product size once the user selects a product name
            $('.secondary_data').show();
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
//        var table = $('#table1').DataTable({
//            "pageLength": 10
//        });
        function getProductInfo(product_id) {
            //display the table showing the discounts of the selected product
            var url22='{{url('product_id_for_similar_products')}}';
            axios.post(url22,{'product_id_2_get_similar_products':product_id})
                .then(function (result33) {
                    //display the value for the single product selling price
                    $('#single_product_price').val(result33.data.displayInput.single_product_price_selling_price);
                    //set the discounted value for the product
                    if (result33.data.single_discount_details.new_dicounted_selling_price == ""){
                        $('#discounted_product_price').val("No discount Offered");
                    }else {
                        $('#discounted_product_price').val(result33.data.single_discount_details.new_discounted_selling_price);
                    }
//                    set the max value of the product amount
                         max_product_amount=result33.data.product_amount;
                    $(function(){
                        $("#product_amount").prop('min',0);
                        $("#product_amount").prop('max',max_product_amount);
                    });
                });

        }

        function calculateTotalPrice() {
            var product_amount=$('#product_amount').val();
            var discounted_selling_price=$('#discounted_product_price').val();
            var single_product_price=$('#single_product_price').val();
            var total_price;
            if (discounted_selling_price == ""){
                 total_price=product_amount*single_product_price;

            }else{
                 total_price=product_amount*discounted_selling_price;
            }
           $('#product_total_price').val(total_price);


            discounted_price=$("#discounted_product_price").val();
            inital_product_price=$('#single_product_price').val();
             total_cost_j = $("#product_total_price").val();
        }

    </script>

    {{--code to add records dynamically--}}
        {{--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>--}}
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


        {{--<script type="text/javascript" src="{{asset('template/js/pages/table-advanced.js')}}"></script>--}}
@endsection