@extends('layouts.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">

    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />


    <link href="{{asset('template/vendors/iCheck/skins/all.css')}}" rel="stylesheet" />
    <link href="{{asset('template/css/pages/formelements.css')}}" rel="stylesheet" />
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
                            New Buyer
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <a class="btn btn-success btn-large" data-toggle="modal" data-href="#responsive" href="#responsive">New Buyer</a>

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

                                <th> Buyer Name</th>
                                <th> Buyer Company Name</th>

                                <th>
                                   Buyer Type
                                </th>
                                <th>
                                   Loyal Customer
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
                            @foreach($buyers as $buyer)
                                <tr>

                                    <td>{{$buyer->buyer_name}}</td>
                                    <td>{{$buyer->buyer_company_name}}</td>

                                    <td>{{$buyer->buyer_type}}</td>
                                    <td>
                                        @if($buyer->is_loyal_customer==true)

                                            <span class="label label-sm label-success">Yes</span>
                                        @else

                                            <span class="label label-sm label-warning">No</span>
                                        @endif
                                        </td>
                                    <td>
                                        <a href="#" data-target="#edit_modal" data-toggle="modal" onclick="getBuyerId({{$buyer->id}})"> Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" data-target="#delete" data-toggle="modal" onclick="getId({{$buyer->id}})"> Delete</a>
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
                    <form action="{{url('delete_buyer')}}" method="post">
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
    {{--new buyer modal--}}
    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Buyer</h4>
                </div>
                <form action="{{url('new_buyer')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                {{--@if($errors->has('unit_update'))--}}
                                {{--{{$errors->has('unit_update')->first()}}--}}
                                {{--@endif--}}

                                {{--@if(count($errors)>0)--}}

                                {{--{{$errors->first()}}--}}

                                {{--@endif--}}
                            </div>
                            <div class="col-md-6">

                                {{--<h4>Some More data</h4>--}}
                                <p>
                                    <label for="buyer_name">Buyer Name</label>

                                    <input id="buyer_name" name="buyer_name" type="text" placeholder="Buyer Name" value="{{old('buyer_name')}}" class="form-control" required>
                                </p>
                                <p>
                                    <label for="buyer_company_name">Buyer Company Name</label>

                                    <input id="buyer_company_name" name="buyer_company_name" type="text" placeholder="Buyer Company Name" value="{{old('buyer_company_name')}}" class="form-control" required>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="buyer_type">Buyer Type</label>
                                    <select name="buyer_type" id="buyer_type" class="form-control" required>
                                        <option selected disabled>Select Buyer Type</option>
                                        <option value="wholesale">WholeSale</option>
                                        <option value="retail">Retail</option>

                                    </select>
                                    {{--<input id="supplier_phone_no" name="supplier_phone_no" type="text" placeholder="Supplier Phone Number" value="{{old('product_supplied_name')}}" class="form-control" required>--}}
                                </p>
                                <div class="form-group">
                                <p>
                                    <label for="loyal_customer">Loyal Customer</label>
                                <br>
                                    <input type="checkbox" name="is_loyal_customer" id="loyal_customer" class="checkbox" />

                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Buyer</button>
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
                            <div class="col-md-6">
                                <input type="hidden" id="selected_id_to_edit" name="edit_supplier_id">
                                {{--<h4>Some More data</h4>--}}
                                <p>
                                    <label for="edit_supplier_name">Supplier Name</label>

                                    <input id="edit_supplier_name" name="edit_supplier_name" type="text" placeholder="Supplier Name"  class="form-control" required>
                                </p>
                                <p>
                                    <label for="edit_supplier_company_name">Supplier Company Name</label>

                                    <input id="edit_supplier_company_name" name="edit_supplier_company_name" type="text"   class="form-control" required>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="edit_supplier_phone_no">Supplier Phone Number</label>

                                    <input id="edit_supplier_phone_no" name="edit_supplier_phone_no" type="text" class="form-control" required>
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

    <script type="text/javascript" src="{{asset('template/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/pages/table-advanced.js')}}"></script>

    {{--modal--}}
    <script src="{{asset('template/vendors/modal/js/classie.js')}}"></script>
    <script src="{{asset('template/vendors/modal/js/modalEffects.js')}}"></script>

    <script src="{{asset('template/vendors/iCheck/icheck.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/iCheck/demo/js/custom.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/pages/formelements.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/card/jquery.card.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        function getId(id) {
            $('#selected_id').val(id);
        }
    </script>
    <script type="application/javascript">

        function getBuyerId(buyerId) {
            var url34='{{url('get_buyer_id_for_edit')}}';
            axios.post(url34,{'buyer_id':buyerId})
                .then(function (result33) {
                  alert(result33.data.buyer.buyer_name);
                  //TODO complete the edit modal here
                })

        }
    </script>

@endsection