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
                            New Role
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <a class="btn btn-success btn-large" data-toggle="modal" data-href="#responsive" href="#responsive">New Role</a>

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
                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                            <tr>

                                <th> Role Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Permissions</th>
                                <th>Creation Date</th>

                                <th>
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>

                                    <td>{{$role->name}}</td>
                                    <td>{{$role->display_name}}</td>

                                    <td>{{$role->description}}</td>
                                    <td><li>add</li>
                                        <li>add</li></td>
                                    <td>{{$role->created_at->toDayDateTimeString()}}</td>

                                    <td>
                                        <a href="{{route('delete_role.id',['id'=>$role->id])}}" > Delete</a>
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
                    <div class="modal-body">
                        <input id="selected_id" type="hidden">
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-warning-sign"></span>
                            Are you sure you want to delete this Record?
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning" onclick="deleteUser()">
                            <span class="glyphicon glyphicon-ok-sign"></span>
                            Yes
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" >
                            <span class="glyphicon glyphicon-remove"></span>
                            No
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal ends here -->
    </section>


    {{--modal section--}}
    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Role</h4>
                </div>
                <form action="{{route('new_role')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                @if(count($errors->all())>0)
                                    @foreach($errors->all() as $error)
                                   <li>{{$error}}</li>

                                    @endforeach

                                @endif
                            </div>
                            <div class="col-md-10 col-md-offset-2">

                                {{--<h4>Some More data</h4>--}}
                                <p>
                                    <label for="name">Role Name</label>

                                    <input id="name" name="name" type="text" placeholder="Role name" value="{{old('name')}}" class="form-control" required>
                                </p>
                                <p>
                                    <label for="display_name" >Role Display Name</label>
                                    <input id="display_name" name="display_name" type="text"  value="{{old('display_name')}}" placeholder="Display Name" class="form-control" required>
                                </p>
                                <p>
                                    <label for="description" >Description</label>
                                    <input id="description" name="description" type="text"  value="{{old('description')}}" placeholder="Description" class="form-control" required>

                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Role</button>
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
@endsection