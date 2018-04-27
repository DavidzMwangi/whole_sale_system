@extends('layouts.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">

    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />
    <link href="{{asset('template/vendors/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/css/styles/black.css')}}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{asset('template/css/panel.css')}}" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .checkboxThree {
            width: 120px;
            height: 40px;
            background: #333;
            margin: 20px 60px;

            border-radius: 50px;
            position: relative;
        }
        .checkboxThree:before {
            content: 'On';
            position: absolute;
            top: 12px;
            left: 13px;
            height: 2px;
            color: #26ca28;
            font-size: 16px;
        }
        .checkboxThree:after {
            content: 'Off';
            position: absolute;
            top: 12px;
            left: 84px;
            height: 2px;
            color: greenyellow;
            font-size: 16px;
        }
        .checkboxThree label {
            display: block;
            width: 52px;
            height: 22px;
            border-radius: 50px;

            transition: all .5s ease;
            cursor: pointer;
            position: absolute;
            top: 9px;
            z-index: 1;
            left: 12px;
            background: #ddd;
        }

        /**
         * Create the checkbox event for the label
         */
        .checkboxThree input[type=checkbox]:checked + label {
            left: 60px;
            background: #26ca28;
        }
    </style>
    <style type="text/css">
        .checkboxThree_edit {
            width: 120px;
            height: 40px;
            background: #333;
            margin: 20px 60px;

            border-radius: 50px;
            position: relative;
        }
        .checkboxThree_edit:before {
            content: 'On';
            position: absolute;
            top: 12px;
            left: 13px;
            height: 2px;
            color: #26ca28;
            font-size: 16px;
        }
        .checkboxThree_edit:after {
            content: 'Off';
            position: absolute;
            top: 12px;
            left: 84px;
            height: 2px;
            color: greenyellow;
            font-size: 16px;
        }
        .checkboxThree_edit label {
            display: block;
            width: 52px;
            height: 22px;
            border-radius: 50px;

            transition: all .5s ease;
            cursor: pointer;
            position: absolute;
            top: 9px;
            z-index: 1;
            left: 12px;
            background: #ddd;
        }

        /**
         * Create the checkbox event for the label
         */
        .checkboxThree_edit input[type=checkbox]:checked + label {
            left: 60px;
            background: #26ca28;
        }
    </style>
    {{--<link href="vendors/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />--}}
    {{--<!--select css-->--}}
    {{--<link href="vendors/select2/select2.css" rel="stylesheet" />--}}
    {{--<link rel="stylesheet" href="vendors/select2/select2-bootstrap.css" />--}}

    {{--<link href="{{asset('template/vendors/iCheck/skins/all.css')}}" rel="stylesheet" />--}}
    {{--<link href="{{asset('template/css/pages/formelements.css')}}" rel="stylesheet" />--}}
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
                            New Supplies
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <a class="btn btn-success btn-large" data-toggle="modal" data-href="#responsive" href="#responsive">New Supplies</a>

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


                        @foreach($errors->all as $error)

                           <li> {{$error}}</li>

                        @endforeach
                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                            <tr>

                                <th> Supplier Name</th>
                                <th> Product Name</th>
                                <th> Single Product Price</th>
                                <th> Unit Type</th>
                                <th>Tax in Percentage</th>
                                <th>
                                    Date of Creation
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
                            @foreach($supplies as $supply)
                                <tr>

                                    <td>{{$supply->supplier->supplier_name}}</td>
                                    <td>{{$supply->product_name}}</td>
                                    <td>{{$supply->single_product_price}}</td>
                                    <td>{{$supply->unit->unit_name}}</td>
                                    <td>@if($supply->tax_percentage==null)
                                            0%
                                        @else
                                            {{$supply->tax_percentage}}%
                                            @endif
                                    </td>
                                    <td>{{$supply->created_at->toDateString()}}</td>
                                    <td>
                                        <a href="#" data-target="#edit_modal" data-toggle="modal" onclick="getSupplyDetails({{$supply->id}})"> Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" data-target="#delete" data-toggle="modal" onclick="getId({{$supply->id}})"> Delete</a>
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
                    <form action="{{url('delete_supply')}}" method="post">
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


    {{--modal section--}}
    {{--new unit modal--}}
    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Supplies</h4>
                </div>
                <form action="{{url('new_supply')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                                  @endforeach
                            </div>
                            <div class="col-md-6">


                                <p>
                                    <label for="supplier_name">Supplier Name</label>
                                    <select id="supplier_name" name="supplier_name" class="form-control">
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                            @endforeach
                                    </select>
                                    {{--<input id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>--}}
                                </p>
                                <p>
                                    <label for="product_name">Product Name</label>

                                    <input id="product_name" name="product_name" type="text" placeholder="Product Name" value="{{old('product_name')}}" class="form-control" required>
                                </p>
                                {{--<p>--}}
                                    {{--<label for="add_tax_checkbox">Add Tax</label>--}}
                                    {{--<input  id="add_tax_checkbox" class="flat-red" type="checkbox" value="Add Tax">--}}
                                {{--</p>--}}
                                <section >
                                    <h3>Tax</h3>
                                <div class="checkboxThree">

                                    <input type="checkbox" value="1" id="checkboxThreeInput" name="check"  />
                                    <label  for="checkboxThreeInput"> </label >
                                </div>
                                </section>
                            </div>
                            <div class="col-md-6">
                                {{--<p>--}}
                                    {{--<label for="unit_name">Product Supplied Amount</label>--}}

                                    {{--<input id="product_supplied_amount" name="product_supplied_amount" type="number" placeholder="Product Supplied Amount" value="{{old('product_supplied_amount')}}" class="form-control" required>--}}
                                {{--</p>--}}
                                <p>
                                    <label for="unit_type">Unit Type</label>
                                    <select id="unit_type" name="unit_type" class="form-control">
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                        @endforeach
                                    </select>
                                    {{--<input id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>--}}
                                </p>
                                <p>
                                    <label for="single_product_price">Single Product Price</label>

                                    <input id="single_product_price" name="single_product_price"  placeholder="Single Product price" value="{{old('single_product_price')}}" class="form-control" required>
                                </p>
                                <p id="tax_paragraph">
                                    <label for="tax_percentage">Tax In Percentage</label>

                                    <input id="tax_percentage" name="tax_percentage"  placeholder="Tax in Percentage" value="{{old('tax_percentage')}}" class="form-control" type="number" max="100">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Supply</button>
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
                <form action="{{url('editted_supplies')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                @if(count($errors)>0)


                                @endif
                            </div>
                            <div class="col-md-6">

                                <input type="hidden" id="selected_supply_to_edit" name="selected_supply_to_edit">
                                <p>
                                    <label for="edit_supplier_name">Supplier Name</label>
                                    <select id="edit_supplier_name" name="edit_supplier_name" class="form-control">


                                    </select>
                                    {{--<input id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>--}}
                                </p>

                                <p>
                                    <label for="edit_product_name">Product Name</label>

                                    <input id="edit_product_name" name="edit_product_name" type="text" placeholder="Product Name" value="{{old('product_name')}}" class="form-control" required>
                                </p>
                                <p>
                                    <label for="edit_single_product_price">Single Product Price</label>

                                    <input id="edit_single_product_price" name="edit_single_product_price" type="number" placeholder="Single Product price" value="{{old('single_product_price')}}" class="form-control" required>
                                </p>

                                <section >
                                    <h3>Tax</h3>
                                    <div class="checkboxThree_edit">

                                        <input type="checkbox" value="1" id="checkboxThreeInput_edit" name="check"  />
                                        <label  for="checkboxThreeInput_edit"> </label >
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-6">
                                {{--<p>--}}
                                    {{--<label for="edit_product_supplied_amount">Product Supplied Amount</label>--}}

                                    {{--<input id="edit_product_supplied_amount" name="edit_product_supplied_amount" type="number" placeholder="Product Supplied Amount" value="{{old('product_supplied_amount')}}" class="form-control" required>--}}
                                {{--</p>--}}
                                <p>
                                    <label for="edit_unit_type">Unit Type</label>
                                    <select id="edit_unit_type" name="edit_unit_type" class="form-control" required>


                                    </select>
                                    {{--<input id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>--}}
                                </p>
                                <p id="tax_paragraph_edit">
                                    <label for="tax_percentage_edit">Tax In Percentage</label>

                                    <input id="tax_percentage_edit" name="tax_percentage_edit"  placeholder="Tax in Percentage" value="{{old('tax_percentage')}}" class="form-control" type="number" max="100">
                                </p>
                            </div>
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

    <script type="text/javascript">
        $('#tax_paragraph').hide();
        $("#checkboxThreeInput").click(function() {
            if($('#checkboxThreeInput').is(':checked')){
                $('#tax_paragraph').show();
            }else {
                $('#tax_paragraph').hide();
                $('#checkboxThreeInput').val("");
//                alert($('#checkboxThreeInput').val());
            }

        });

//        tax input tag for edit
        $('#tax_paragraph_edit').hide();
        $("#checkboxThreeInput_edit").click(function() {
            if($('#checkboxThreeInput_edit').is(':checked')){
                $('#tax_paragraph_edit').show();
            }else {
                $('#tax_paragraph_edit').hide();
                $('#checkboxThreeInput_edit').val("");
//                alert($('#checkboxThreeInput').val());
            }

        });
            @if(count($errors->all())>0)
            {{--@if($errors->has('damn'))--}}
            $('#responsive').show();
            @endif
    </script>
    <script type="text/javascript">
        function getSupplyDetails(selectedId) {
            $('#selected_supply_to_edit').val(selectedId);
            //get the details of the record from the DB

            var url2='{{url('get_supply_details_4_edit')}}';
            axios.post(url2,{'supply_for_editting_id':selectedId})
                .then(function (result25) {
                    $('#edit_single_product_price').val(result25.data.supplies99.single_product_price);
                    $('#edit_product_supplied_amount').val(result25.data.supplies99.product_supplied_amount);
                    $('#edit_product_name').val(result25.data.supplies99.product_name);
//                    $('#edit_supplier_name').append("<option disabled selected >Select A Property First</option>");
                    $('#edit_supplier_name').append("<option   value='"+result25.data.supplies99.supplier_id+"' selected>"+result25.data.supplies99.supplier.supplier_name+"</option>")
//                        $.each(result25.data.supplies99,function (key,value) {
//                        $('#edit_supplier_name').append("<option   value='"+value.id+"'>"+value.supplier.supplier_name+"</option>")
//                   })


                    //the unit select tag

                    $('#edit_unit_type').append("<option disabled selected >Select A Unit type</option>");
                        $.each(result25.data.units,function (key,value) {
                        $('#edit_unit_type').append("<option   value='"+value.id+"' >"+value.unit_name+"</option>")
                   })
                })

        }

        function getId(id) {
            $('#selected_id').val(id);
        }


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

    {{--<script src="{{asset('template/vendors/iCheck/icheck.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('template/vendors/iCheck/demo/js/custom.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('template/vendors/maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('template/vendors/card/jquery.card.js')}}" type="text/javascript"></script>--}}
@endsection