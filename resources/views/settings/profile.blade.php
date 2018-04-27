@extends('layouts.main')
@section('style')
    <link href="{{asset('template/vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/vendors/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/css/pages/user_profile.css')}}" rel="stylesheet" type="text/css"/>
    @endsection

@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>User Profile</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li class="active">User Profile</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                            User Profile</a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="#tab2" data-toggle="tab">--}}
                            {{--<i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>--}}
                            {{--Change Password</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="user_profile.html" >--}}
                            {{--<i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>--}}
                            {{--Advanced User Profile</a>--}}
                    {{--</li>--}}

                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                            Company Profile
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <form action="{{url('upload_company_pic')}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-file">
                                                    <img src="{{asset('uploads/company_profile/'. $profile->company_pic)}}" ></div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-max"></div>
                                                <div>
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="company_profile_pic" ></span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    <input type="submit" class="btn btn-success">
                                                </div>
                                            </div>

                                            </form>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <form action="{{url('update_company_details')}}" method="post">
                                                        {{csrf_field()}}
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                            <td><label for="company_name">Company Name</label></td>
                                                            <td>
                                                                <input name="company_name" id="company_name" class="form-control" value="{{$profile->company_name}}" required>
                                                                {{--<a href="#" data-pk="1" class="editable" data-title="Edit User Name">Bella</a>--}}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td><label for="company_initials"> Company Initials</label></td>
                                                            <td>
                                                                <input type="text" name="company_initials" class="form-control" id="company_initials" value="{{$profile->company_initials}}" required>
                                                                {{--<a href="#" data-pk="1" class="editable" data-title="Edit E-mail">gankunding@hotmail.com</a>--}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label for="company_phone_no"> Company Phone Number</label></td>
                                                            <td>
                                                                <input type="text" name="company_phone_no" class="form-control" id="company_phone_no" value="{{$profile->company_phone_no}}" required>
                                                                {{--<a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">(999) 999-9999</a>--}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="company_address"> Company Address</label></td>
                                                            <td>
                                                                <input name="company_address" id="company_address" class="form-control" value="{{$profile->company_address}}" required>
                                                                {{--<a href="#" data-pk="1" class="editable" data-title="Edit Address">Sydney, Australia</a>--}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="company_email">Company Email</label></td>
                                                            <td>
                                                                <input name="company_email" id="company_email" value="{{$profile->company_email}}" class="form-control" required>
                                                                {{--<a href="#" id="status" data-type="select" data-pk="1" data-value="1" data-title="Status"></a>--}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="company_website">Company Website</label></td>
                                                            <td>
                                                                <input value="{{$profile->company_website}}" name="company_website" id="company_website" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="company_location">Company Location</label></td>
                                                            <td>
                                                                <input name="company_location" id="company_location" value="{{$profile->company_location}}" class="form-control" required>
                                                                {{--<a href="#" data-pk="1"  class="editable" data-title="Edit City">Nakia</a>--}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                        <input type="submit" class="btn btn-success" >
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div id="tab2" class="tab-pane fade">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12 pd-top">--}}
                                {{--<form action="#" class="form-horizontal">--}}
                                    {{--<div class="form-body">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="inputpassword" class="col-md-3 control-label">--}}
                                                {{--Password--}}
                                                {{--<span class='require'>*</span>--}}
                                            {{--</label>--}}
                                            {{--<div class="col-md-9">--}}
                                                {{--<div class="input-group">--}}
                                                            {{--<span class="input-group-addon">--}}
                                                                {{--<i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>--}}
                                                            {{--</span>--}}
                                                    {{--<input type="password" placeholder="Password" class="form-control"/>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="inputnumber" class="col-md-3 control-label">--}}
                                                {{--Confirm Password--}}
                                                {{--<span class='require'>*</span>--}}
                                            {{--</label>--}}
                                            {{--<div class="col-md-9">--}}
                                                {{--<div class="input-group">--}}
                                                            {{--<span class="input-group-addon">--}}
                                                                {{--<i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>--}}
                                                            {{--</span>--}}
                                                    {{--<input type="password" placeholder="Password" class="form-control"/>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-actions">--}}
                                        {{--<div class="col-md-offset-3 col-md-9">--}}
                                            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                                            {{--&nbsp;--}}
                                            {{--<button type="button" class="btn btn-danger">Cancel</button>--}}
                                            {{--&nbsp;--}}
                                            {{--<input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
    @endsection

@section('script')
    <script  src="{{asset('template/vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/x-editable/jquery.mockjax.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/x-editable/bootstrap-editable.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/pages/user_profile.js')}}" type="text/javascript"></script>
    @endsection