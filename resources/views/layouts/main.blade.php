<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WholeSale System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{asset('uploads/company_profile/profile.png')}}" >

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <!-- global css -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{asset('template/vendors/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/css/styles/black.css')}}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{asset('template/css/panel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('template/css/metisMenu.css')}}" rel="stylesheet" type="text/css"/>
    <!-- end of global css -->

@yield('style')
    <!--end of page level css-->
</head>

<body class="skin-josh">
<header class="header">
    <div>
    <a href="#" class="logo">


        @php($pic_address=\App\Models\Profile::find(1))
        @if($pic_address!=null)
       <img src="{{asset('uploads/company_profile/'.$pic_address->company_pic)}}" class="img-circle " height="50dp" width="50dp" alt="Logo">
            @else
            <img src="{{asset('uploads/company_profile/profile.png')}}" class="img-circle " height="50dp" width="50dp" alt="Logo">

        @endif
    </a>
    </div>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages pull-right">
                        <li class="dropdown-title">4 New Messages</li>
                        <li class="unread message">
                            <a href="javascript:;" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                <div class="message-body">
                                    <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong>
                                    <br>Hello, You there?
                                    <br>
                                    <small>8 minutes ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="unread message">
                            <a href="javascript:;" class="message">
                                <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                <div class="message-body">
                                    <strong>John Kerry</strong>
                                    <br>Can we Meet ?
                                    <br>
                                    <small>45 minutes ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="unread message">
                            <a href="javascript:;" class="message">
                                <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                    <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                </i>
                                <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                <div class="message-body">
                                    <strong>Jenny Kerry</strong>
                                    <br>Dont forgot to call...
                                    <br>
                                    <small>An hour ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="unread message">
                            <a href="javascript:;" class="message">
                                <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                    <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                </i>
                                <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                <div class="message-body">
                                    <strong>Ronny</strong>
                                    <br>Hey! sup Dude?
                                    <br>
                                    <small>3 Hours ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="footer">
                            <a href="#">View all</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                        <span class="label label-warning">7</span>
                    </a>
                    <ul class=" notifications dropdown-menu">
                        <li class="dropdown-title">You have 7 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                    <?php
                                    if (count(\App\User::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->get())){

                                        ?>
                                        <li>
                                        <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                    <a href="#">New User has been created</a>
                                    <small class="pull-right">
                                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                        <?php
                                            $new_user=\App\User::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->first();
                                            echo $new_user->created_at->toTimeString();
                                            ?>

                                        </small>
                                        </li>
                                        <?php

                                    }
                                    ?>


                                    <?php
                                    if (count(\App\Models\Unit::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->get())){
                                        ?>
                                        <li>
                                        <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">New Unit added</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            {{--Few seconds ago--}}
                                            <?php
                                                $new_unit=\App\Models\Unit::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->first();
                                                echo $new_unit->unit_full_name;
                                            ?>
                                        </small>
                                        </li>
                                        <?php
                                    }
                                        ?>


                                    <?php
                                        if (count(\App\Models\Supplier::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->get())){
                                           ?>
                                        <li>
                                            <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                    <a href="#">New Supplier Added</a>
                                    <small class="pull-right">
                                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            {{--8 minutes ago--}}
                                        <?php
                                        $new_supplier=\App\Models\Supplier::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->first();
                                        echo $new_supplier->supplier_name;
                                        ?>
                                            </small>
                                        </li>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (count(\App\Models\Supply::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->get())){
                                            ?>
                                <li>
                                    <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                    <a href="#">New Supply added</a>
                                    <small class="pull-right">
                                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                        {{--An hour ago--}}
                                        <?php
                                        $new_supply=\App\Models\Supply::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->first();
                                        echo $new_supply;
                                            ?>
                                    </small>
                                </li>
                                        <?php
                                            }
                                            ?>

                                        <?php
                                        if (count(\App\Models\Product::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->get())){
                                            ?>
                                        <li>
                                    <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                    <a href="#">New Product Added</a>
                                    <small class="pull-right">
                                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                        {{--3 Hours ago--}}
                                        <?php
                                        $new_product=\App\Models\Product::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->first();
                                        echo $new_product;
                                            ?>
                                    </small>
                                </li>
                                        <?php
                                            }
                                            ?>

                                        <?php
                                        if (count(\App\Models\Discount::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->get())){
                                            ?>
                                <li>
                                    <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                    <a href="#">New Discount added</a>
                                    <small class="pull-right">
                                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                        {{--Yesterday--}}
                                        <?php
                                        $new_product=\App\Models\Discount::whereDate('created_at',\Carbon\Carbon::today())->orderBy('id','desc')->first();
                                        echo $new_product;
                                            ?>
                                    </small>
                                </li>
                                        <?php
                                            }
                                            ?>
                                {{--<li>--}}
                                    {{--<i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>--}}
                                    {{--<a href="#">David liked your photo</a>--}}
                                    {{--<small class="pull-right">--}}
                                        {{--<span class="livicon paddingright_10" data-n="timer" data-s="10"></span>--}}
                                        {{--2 July 2014--}}
                                    {{--</small>--}}
                                {{--</li>--}}
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img data-src="holder.js/35x35/#fff:#000" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                        <div class="riot">
                            <div>
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            {{--<img data-src="holder.js/90x90/#fff:#000" class="img-responsive img-circle" alt="User Image">--}}
                            <p class="topprofiletext">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="{{url('profile')}}">
                                <i class="livicon" data-name="user" data-s="18"></i>
                                My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="gears" data-s="18"></i>
                                Account Settings
                            </a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="lockscreen.html">
                                    <i class="livicon" data-name="lock" data-s="18"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="login.html">
                        {{--<li>--}}
                            {{--<a href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                {{--Logout--}}
                            {{--</a>--}}


                        {{--</li>--}}
                                    <i class="livicon" data-name="sign-out" data-s="18"></i>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')
        <!-- /.sidebar -->

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Main content -->

        @yield('content')

    </aside>
    <!-- right-side -->
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- global js -->
<script src="{{asset('template/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!--livicons-->
<script src="{{asset('template/vendors/livicons/minified/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/vendors/livicons/minified/livicons-1.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/josh.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/metisMenu.js')}}" type="text/javascript"> </script>
<script src="{{asset('template/vendors/holder-master/holder.js')}}" type="text/javascript"></script>
<!-- end of global js -->
<!-- begining of page level js -->
<script src="{{asset('js/axios.min.js')}}" type="text/javascript"></script>

<!--  todolist-->
@yield('script')
<!-- end of page level js -->

</body>
</html>
