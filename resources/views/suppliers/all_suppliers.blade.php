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
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            New Supplier
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <a class="btn btn-success btn-large" data-toggle="modal" data-href="#responsive" href="#responsive">New Supplier</a>

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
                        <table class="table table-striped table-responsive table-bordered" id="table1">
                            <thead>
                            <tr>

                                <th> Supplier Name</th>
                                <th> Supplier Company Name</th>

                                <th>
                                   Supplier Phone Number
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
                            @foreach($suppliers as $supplier)
                                <tr>

                                    <td>{{$supplier->supplier_name}}</td>
                                    <td>{{$supplier->supplier_company_name}}</td>

                                    <td>{{$supplier->supplier_phone_no}}</td>
                                    <td>
                                        <a href="#" data-target="#edit_modal" data-toggle="modal" onclick="getSupplierDetails({{$supplier->id}})"> Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" data-target="#delete" data-toggle="modal" onclick="getId({{$supplier->id}})"> Delete</a>
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


    {{--modal section--}}
    {{--new unit modal--}}
    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Supplier</h4>
                </div>
                <form action="{{url('new_supplier')}}" method="post">
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
                                    <label for="supplier_name">Supplier Name</label>

                                    <input id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>
                                </p>
                                <p>
                                    <label for="supplier_company_name">Supplier Company Name</label>

                                    <input id="supplier_company_name" name="supplier_company_name" type="text" placeholder="Supplier Name" value="{{old('supplier_name')}}" class="form-control" required>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="supplier_phone_no">Supplier Phone Number</label>

                                    <input id="supplier_phone_no" name="supplier_phone_no" type="text" placeholder="Supplier Phone Number" value="{{old('product_supplied_name')}}" class="form-control" required>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Supplier</button>
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

{{--                                    {{$errors->first()}}--}}

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

    <script type="text/javascript">
        function getSupplierDetails(selectedId) {
            $('#selected_id_to_edit').val(selectedId);
            //get the details of the record from the DB

            var url2='{{url('get_supplier_details_4_edit')}}';
            axios.post(url2,{'supplier_for_editting_id':selectedId})
                .then(function (result24) {
                    $('#edit_supplier_name').val(result24.data.supplier.supplier_name);
                    $('#edit_supplier_company_name').val(result24.data.supplier.supplier_company_name);
                    $('#edit_supplier_phone_no').val(result24.data.supplier.supplier_phone_no);
                })

        }

        function getId(id) {
            $('#selected_id').val(id);
        }

        {{--function deleteUser() {--}}
        {{--var selected_id=$('#selected_id').val();--}}
        {{--//           alert(selected_id);--}}
        {{--var url1='{{url('delete_user')}}';--}}
        {{--axios.post(url1,{'user_to_delete_id':selected_id})--}}
        {{--.then(function (result1) {--}}
        {{--$('#delete').modal('hide');--}}
        {{--window.location='{{url('all_users')}}';--}}
        {{--alert(result1.data.status1);--}}
        {{--})--}}
        {{--}--}}
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
@endsection