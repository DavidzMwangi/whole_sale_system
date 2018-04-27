@extends('layouts.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">

    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />

    <link href="{{asset('template/vendors/select2/select2.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('template/vendors/select2/select2-bootstrap.css')}}" />
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
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            New Product
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
<div class="col-md-6">
                        <a class="btn btn-success btn-large" data-toggle="modal" data-href="#responsive" href="#responsive">New Product</a>
                        <a class="btn btn-success btn-large" href="{{url('convert_products_to_excel')}}">Export to Excel</a>
</div>
    <div class="col-md-6">
                        <form  action="{{ url('import_products')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="import_file" />
                            <button class="btn btn-primary">Import File</button>
                        </form>
                      </div>
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

                                <th> Supplier Name</th>
                                <th> Product Name</th>
                                <th> Product Size</th>
                                @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
                                <th>
                                    Single Product Price<br> Buying Price
                                </th>
                                @endif
                                <th>
                                    Single Product Price<br> Selling Price
                                </th>
                                <th>
                                    Supplied Amount
                                </th>
                                <th>
                                    Total Price
                                </th>
                                <th>
                                    Arrival Date
                                </th>
                                <th>
                                    Expiry Date
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>

                                    <td>{{$product->supply->first()->supplier->supplier_name}}</td>
                                    <td>{{$product->supply->first()->product_name}}</td>
                                    <td>{{$product->product_size}} {{ $product->supply->first()->unit->unit_name}}</td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
                                    <td>{{$product->single_product_price_buying_price}}</td>
                                    @endif
                                    <td>{{$product->single_product_price_selling_price}}</td>

                                    <td>{{$product->product_supplied_amount}}</td>
                                    <td>{{($product->supply->first()->single_product_price)*($product->product_supplied_amount)}}</td>

                                    <td>{{$product->created_at->toDateString()}}</td>

                                    <td>{{$product->expiry_date}}</td>

                                    <td>
                                        <a href="#" data-target="#edit_modal" data-toggle="modal" onclick="getSupplyDetails({{$product->id}})"> Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" data-target="#delete" data-toggle="modal" onclick="getId({{$product->id}})"> Delete</a>
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

        <!-- /.modal ends here -->
    </section>


    {{--modal section--}}
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
                <form action="{{url('delete_product')}}" method="post">
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



    {{--new unit modal--}}
    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Product</h4>
                </div>
                <form action="{{url('new_product')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                {{--@if($errors->has('unit_update'))--}}
                                {{--{{$errors->has('unit_update')->first()}}--}}
                                {{--@endif--}}

                                {{--@if(count($errors)>0)--}}

                                {{--{{$errors->first()}}--}}

                                {{--@endif--}}
                            </div>
                                <div class="form-group col-md-offset-1 border">
                                <p>New Supplier? First add new Supplier here <a href="{{url('all_suppliers')}}" class="btn btn-success">New Supplier</a> </br>
                              <br>  New Supply? Add new Supply here:<a href="{{url('all_supplies')}}" class="btn btn-success">New Supply</a>

                                </p>
                                </div>
                            <hr>
                            <div class="col-md-6">


                                {{--<p>--}}
                                <div class="form-group">
                                    <label for="e1" class="control-label">
                                       Supplier Name
                                    </label>
                                    <select id="e1" placeholder="Supplier Name"  class="form-control select2"  onchange="getDetails(this.value)" required>
                                        <option  selected disabled>Select The Supplier Name</option>
                                   @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>

                                      @endforeach

                                    </select>
                                </div>

                                {{--</p>--}}
                                <p>
                                    <label for="single_product_price_selling_price">Single Product Selling Price </label>

                                    <input id="single_product_price_buying_price" name="single_product_price_buying_price"  type="hidden"  class="form-control"  required >
                                    <input id="single_product_price_selling_price" name="single_product_price_selling_price"   placeholder="Single Product Price Selling Price"  class="form-control"  required >
                                </p>
                                <p>
                                    <label for="expiry_date">Expiry Date</label>

                                    <input id="expiry_date" name="expiry_date" type="date" min="{{\Carbon\Carbon::today()}}" placeholder="Product Expiry Date" value="{{old('expiry_date')}}" class="form-control" >
                                </p>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="e1" class="control-label">
                                        Product Name
                                    </label>
                                    <select id="supply_select2" placeholder="Product Name" name="supplies_id_for_product_name" class="form-control select2" onchange="getPrice(this.value)" required>

                                    </select>
                                </div>
                                <p>
                                    <label for="supplied_amount">Amount Supplied</label>

                                    <input id="supplied_amount" name="supplied_amount"  placeholder="Amount Supplied" value="{{old('supplied_amount')}}" class="form-control" required >
                                </p>
                                <p>
                                    <label for="product_size"> Single Product Size</label>

                                    <input id="product_size" name="product_size"  placeholder="Product Size" value="{{old('product_size')}}" class="form-control"  required>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--edit existing modal--}}
    <div class="modal fade in" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Supplier</h4>
                </div>
                <form action="{{url('editted_supplier')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                @if(count($errors)>0)


                                @endif
                            </div>
                            {{--<div class="col-md-6">--}}


                                {{--<p>--}}
                                    {{--<label for="edit_supplier_name">Supplier Name</label>--}}
                                    {{--<select id="edit_supplier_name" name="edit_supplier_name" class="form-control">--}}


                                    {{--</select>--}}
                                    {{--<input id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>--}}
                                {{--</p>--}}

                                {{--<p>--}}
                                    {{--<label for="edit_single_product_price">Single Product Price</label>--}}

                                    {{--<input id="edit_single_product_price" name="edit_single_product_price" type="number" placeholder="Single Product price" value="{{old('single_product_price')}}" class="form-control" required>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<p>--}}
                                {{--<label for="edit_product_supplied_amount">Product Supplied Amount</label>--}}

                                {{--<input id="edit_product_supplied_amount" name="edit_product_supplied_amount" type="number" placeholder="Product Supplied Amount" value="{{old('product_supplied_amount')}}" class="form-control" required>--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<label for="edit_unit_type">Unit Type</label>--}}
                                    {{--<select id="edit_unit_type" name="edit_unit_type" class="form-control">--}}


                                    {{--</select>--}}
                                    {{--<input id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Update Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="application/javascript">
        @if(count($errors->all())>0)
            $('#responsive').show();
            @endif
    </script>

    <script type="text/javascript">

    function getDetails(supplier_id) {
      var url1='{{url('get_supplies_supplied')}}';
      axios.post(url1,{'supplier_id_crap':supplier_id})
          .then(function (result11) {
            //post the array to the select 2 of the supply
              $('#supply_select2').append("<option selected disabled >Select A Supply First</option>");
              $.each(result11.data.supplies,function (key,value) {

                  $('#supply_select2').append("<option   value='"+value.id+"'>"+value.product_name+"</option>")

              })
          });

        $('#supply_select2').empty();


    }
    function getId(product_id) {
        $('#selected_id').val(product_id);

    }
    function getPrice(supplies_id) {
//        alert('Stupid');
        var url23='{{url('get_single_product_price_for_product')}}';
        axios.post(url23,{'supplies_id_to_find_price':supplies_id})
            .then(function (result44) {
                $('#single_product_price_buying_price').val(result44.data.supply.single_product_price);
                $('#single_product_price_selling_price').val(result44.data.supply.single_product_price);

            })
    }
//    $('#supply_select2').empty();
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

    <script src="{{asset('template/vendors/select2/select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/pages/formelements.js')}}" type="text/javascript"></script>

@endsection