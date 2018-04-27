@extends('layouts.app')
@section('style')
    {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>--}}
    {{--<![endif]-->--}}
    {{--<!-- global css -->--}}
    {{--<link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<!-- font Awesome -->--}}
    {{--<link href="{{asset('template/vendors/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{asset('template/css/styles/black.css')}}" rel="stylesheet" type="text/css" id="colorscheme" />--}}
    {{--<link href="{{asset('template/css/panel.css')}}" rel="stylesheet" type="text/css"/>--}}
    {{--<link href="{{asset('template/css/metisMenu.css')}}" rel="stylesheet" type="text/css"/>--}}
    {{--<!-- end of global css -->--}}
    {{--<!--page level css -->--}}
    {{--<link rel="stylesheet" href="{{asset('template/vendors/noty-2.2.4/fluid.css')}}" />--}}
    {{--<link href="{{asset('template/css/pages/toastr.css')}}" rel="stylesheet" />--}}
    @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    {{--<script src="{{asset('template/js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>--}}
    {{--<!-- Bootstrap -->--}}
    {{--<script src="{{asset('template/js/bootstrap.min.js')}}" type="text/javascript"></script>--}}
    {{--<!--livicons-->--}}
    {{--<script src="{{asset('template/vendors/livicons/minified/raphael-min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('template/vendors/livicons/minified/livicons-1.4.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('template/js/josh.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('template/js/metisMenu.js')}}" type="text/javascript"> </script>--}}
    {{--<script src="{{asset('template/vendors/holder-master/holder.js')}}" type="text/javascript"></script>--}}
    {{--<!-- end of global js -->--}}
    {{--<!-- begining of page level js -->--}}
    {{--<script type="text/javascript" src="{{asset('template/vendors/noty-2.2.4/js/noty/packaged/jquery.noty.packaged.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{asset('template/vendors/noty-2.2.4/js/script.js')}}"></script>--}}
    @endsection