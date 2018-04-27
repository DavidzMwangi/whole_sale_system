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
                            New User
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <a class="btn btn-success btn-large" data-toggle="modal" data-href="#responsive" href="#responsive">New User</a>

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

                                <th> Name</th>
                                <th>Email</th>
                                <th>User Level</th>
                                <th>Role</th>
                                <th>
                                    Date of Creation
                                </th>
                                <th>
                                   Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>

                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->user_level=='admin')
                                        <span class="label label-sm label-success">Admin</span>
                                        @else
                                        <span class="label label-sm label-info">Accountant</span>
                                        @endif

                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary" data-target="#role_modal" data-toggle="modal" onclick="getAllRoles({{$user->id}})">Attach Role</a> </td>
                                <td>{{$user->created_at->toDateString()}}</td>

                                <td>
                                   <a href="#" data-target="#delete" data-toggle="modal" onclick="getId({{$user->id}})"> Delete</a>
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
        <!--role modal starts here-->
        <div class="modal fade" id="role_modal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">
                            Attach Role
                        </h4>
                    </div>
                    <div class="modal-body">


                        <table class="table table-striped table-responsive" id="role_table">
                            <thead>
                            <tr>

                                <th> Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Role</th>

                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($users as $user)--}}
                                {{--<tr>--}}

                                    {{--<td>{{$user->name}}</td>--}}
                                    {{--<td>{{$user->email}}</td>--}}
                                    {{--<td>@if($user->user_level=='admin')--}}
                                            {{--<span class="label label-sm label-success">Admin</span>--}}
                                        {{--@else--}}
                                            {{--<span class="label label-sm label-info">Accountant</span>--}}
                                        {{--@endif--}}

                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="#" class="btn btn-primary">Attach Role</a> </td>--}}

                                {{--</tr>--}}
                            {{--@endforeach--}}

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-success" onclick="assignRole()">
                            <span class="glyphicon glyphicon-ok-sign"></span>
                            Yes
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
                    <h4 class="modal-title">New User</h4>
                </div>
                <form action="{{url('new_user')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="alert-danger">
                            @if(count($errors)>0)
                                {{--@foreach($errors as $error)--}}
                                    {{--{{$error}}--}}

                                    {{--@endforeach--}}
                                {{$errors->first()}}

                                @endif
                        </div>
                        <div class="col-md-6">

                            {{--<h4>Some More data</h4>--}}
                            <p>
                                <label for="name">User Name</label>

                                <input id="name" name="name" type="text" placeholder="Your name" value="{{old('name')}}" class="form-control" required>
                            </p>
                            <p>
                                <label for="email" >Email</label>
                                <input id="email" name="email" type="email"  value="{{old('email')}}" placeholder="Your Email" class="form-control" required>
                            </p>
                            <p>
                                <label for="user_level">User Level</label>
                            <select class="form-control" name="user_level" id="user_level" required>
                                <option value="admin" >Administrator</option>
                                <option value="accountant">Accountant</option>
                            </select>
                            </p>
                            {{--<p>--}}
                                {{--<input id="name2" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--<input id="name3" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--<input id="name4" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--<input id="name5" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                        </div>
                        <div class="col-md-6">
                            {{--<h4>Some More data</h4>--}}
                            <p>
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" placeholder="Your Password" class="form-control" required>
                            </p>
                            <p>
                                <label for="password-confirm">Password Confirmation</label>
                                <input id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control" required>
                            </p>
                            {{--<p>--}}
                                {{--<input id="name8" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--<input id="name9" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--<input id="name10" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--<input id="name41" name="name" type="text" placeholder="Your name" class="form-control">--}}
                            {{--</p>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn">Close</button>
                    <button type="submit" class="btn btn-primary">Create New User</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
        {{--<script type="text/javascript">--}}
           {{--if (count({{$errors->first()}})>0){--}}
               {{--alert('stupid');--}}
               {{--$('#responsive').show('modal');--}}
           {{--}--}}
        {{--</script>--}}
        <script type="text/javascript">
        function getId(selectedId) {
            $('#selected_id').val(selectedId);
//            alert(selectedId)r
        }

        function deleteUser() {
           var selected_id=$('#selected_id').val();
           var url1='{{url('delete_user')}}';
           axios.post(url1,{'user_to_delete_id':selected_id})
               .then(function (result1) {
                   $('#delete').modal('hide');
                   window.location='{{url('all_users')}}';
                    alert(result1.data.status1);
               })
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


        <script type="application/javascript">

            var roles_table=$('#role_table').DataTable({

            });
            function getAllRoles(user_id) {
                window.userId=user_id;
                var url34='{{route('get_all_roles_to_assign')}}';
                roles_table.clear().draw();
                axios.post(url34)
                    .then(function (res34) {
                        $.each(res34.data.roles,function (key, value) {
                            roles_table.row.add([value.name,value.display_name,value.description,'<input type="radio" name="role_id" value="'+value.id+'" id="role_id">'])
                        });
                        roles_table.draw();
                    })
            }
            function assignRole() {
                var role_id;
                $('#role_table input:radio:checked').each(function () {
                    role_id=this.value;

                });
                var url45='{{route('attach_role_to_user')}}';
                axios.post(url45,{'role_id':role_id,'user_id':userId})
                    .then(function () {
            // alert(success);
                    })
                /*
                 $('#business_admins_table input:radio:checked').each(function () {
                user_id=this.value;
            });
                 */
            }
        </script>
    @endsection