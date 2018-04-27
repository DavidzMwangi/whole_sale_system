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
                            New Unit
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <a class="btn btn-success btn-large" data-toggle="modal" data-href="#responsive" href="#responsive">New Unit</a>

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
                            @if($errors->has('unit_update')))
                    {{--<script>--}}
                        {{--alert('stupid')--}}
                    {{--</script>--}}
                        <marquee>{{$errors->first()}}</marquee>

                    @endif
                    @endif
                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                            <tr>

                                <th> Unit Name</th>
                                <th> Unit Full Name</th>

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
                            @foreach($units as $unit)
                                <tr>

                                    <td>{{$unit->unit_name}}</td>
                                    <td>{{$unit->unit_full_name}}</td>

                                    <td>{{$unit->created_at->toDateString()}}</td>
                                    <td>
                                        <a href="#" data-target="#edit_modal" data-toggle="modal" onclick="getUnitDetailsEdit({{$unit->id}})"> Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" data-target="#delete" data-toggle="modal" onclick="getId({{$unit->id}})"> Delete</a>
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
                    <form action="{{url('delete_unit')}}" method="post">
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
                    <h4 class="modal-title">New Unit</h4>
                </div>
                <form action="{{url('new_unit')}}" method="post">
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
                                    <label for="unit_name">Unit Name</label>

                                    <input id="unit_name" name="unit_name" type="text" placeholder="Unit Name" value="{{old('unit_name')}}" class="form-control" required>
                                </p>

                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="unit_name">Unit Full Name</label>

                                    <input id="unit_full_name" name="unit_full_name" type="text" placeholder="Unit Full Name" value="{{old('unit_full_name')}}" class="form-control" required>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Unit</button>
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
                    <h4 class="modal-title">New Unit</h4>
                </div>
                <form action="{{url('editted_unit')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                @if(count($errors)>0)

                                    {{$errors->first()}}

                                @endif
                            </div>
                            <div class="col-md-6">
                            <input type="hidden" id="selected_id_to_edit" name="edit_unit_id">
                                {{--<h4>Some More data</h4>--}}
                                <p>
                                    <label for="unit_name">Unit Name</label>

                                    <input id="edit_unit_name" name="edit_unit_name" type="text" placeholder="Unit Name"  class="form-control" required>
                                </p>

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn pull-left">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script type="text/javascript">
        function getUnitDetailsEdit(selectedId) {
            $('#selected_id_to_edit').val(selectedId);
            //get the details of the record from the DB

            var url2='{{url('get_unit_details_4_edit')}}';
            axios.post(url2,{'unit_for_editting_id':selectedId})
                .then(function (result23) {
                   $('#edit_unit_name').val(result23.data.unit_details.unit_name)
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