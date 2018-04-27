<aside class="left-side sidebar-offcanvas">

<section class="sidebar ">
    <div class="page-sidebar  sidebar-nav">
        <div class="clearfix"></div>
        <!-- BEGIN SIDEBAR MENU -->
        <ul id="menu" class="page-sidebar-menu">
            <li class="">
                <a href="{{url('dashboard')}}">
                    <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            {{--roles and permissions--}}
            @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
                <li>
                    <a href="#">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Roles and Permissions</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('all_roles')}}">
                                <i class="fa fa-angle-double-right"></i>
                                Roles
                            </a>
                        </li>

                        <li>
                            <a href="{{route('all_permissions')}}">
                                <i class="fa fa-angle-double-right"></i>
                                Permissions
                            </a>
                        </li>

                    </ul>
                </li>

            @endif


        @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
            <li class="">
                <a href="{{url('profile')}}">
                    <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Profile</span>
                </a>
            </li>
            @endif
            {{--users tab--}}
            @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
            <li class="">
                <a href="{{url('all_users')}}">
                    <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="badge badge-danger">
                        {{count(\App\User::all())}}
                    </span>
                    Users

                </a>


            </li>
            @endif

            {{--unit tab--}}
            @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
                <li class="">
                    <a href="{{url('all_units')}}">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="badge badge-danger">
                        {{count(\App\Models\Unit::all())}}
                    </span>
                        Unit Types
                    </a>
                </li>
            @endif
            {{--suppliers--}}
            @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
                <li class="">
                    <a href="{{url('all_suppliers')}}">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>

                        <span class="badge badge-danger">
                        {{count(\App\Models\Supplier::all())}}
                    </span>
                        Suppliers
                    </a>
                </li>
            @endif


            {{--supplies--}}
            @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
                <li class="">
                    <a href="{{url('all_supplies')}}">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="badge badge-danger">
                        {{count(\App\Models\Supply::all())}}
                    </span>
                        Supplies
                    </a>
                </li>
            @endif
            <li class="">
                <a href="{{url('all_products')}}">
                    <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="badge badge-danger">
                        {{count(\App\Models\Product::all())}}
                    </span>
                    Products
                </a>
            </li>

            {{--discount--}}
            @if(\Illuminate\Support\Facades\Auth::user()->user_level=='admin')
            <li>
                <a href="#">
                    <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                    <span class="title">Discount</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{url('discounts')}}">
                            <i class="fa fa-angle-double-right"></i>
                            New Discount
                        </a>
                    </li>

                    <li>
                        <a href="{{url('active_discounts')}}">
                            <i class="fa fa-angle-double-right"></i>
                           Existing Active Discount
                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="buttonbuilder.html">--}}
                            {{--<i class="fa fa-angle-double-right"></i>--}}
                            {{--Expired Discounts--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="gridmanager.html">--}}
                            {{--<i class="fa fa-angle-double-right"></i>--}}
                            {{--Page Builder--}}
                        {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>

            @endif

            {{--buyers--}}
                <li class="">
                    <a href="{{url('all_buyers')}}">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="badge badge-danger">
                        {{count(\App\Models\Buyer::all())}}
                    </span>
                        Buyers
                    </a>
                </li>


            {{--purchase--}}
                <li>
                    <a href="#">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Purchase</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{url('new_purchase')}}">
                                <i class="fa fa-angle-double-right"></i>
                                New Purchase
                            </a>
                        </li>

                        <li>
                            <a href="{{url('existing_purchases')}}">
                                <i class="fa fa-angle-double-right"></i>
                              Existing Purchases
                            </a>
                        </li>

                    </ul>
                </li>

            {{--payments--}}
                <li>
                    <a href="#">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Payment</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{url('existing_payments')}}">
                                <i class="fa fa-angle-double-right"></i>
                               Existing Payments
                            </a>
                        </li>

                        {{--<li>--}}
                            {{--<a href="{{url('existing_purchases')}}">--}}
                                {{--<i class="fa fa-angle-double-right"></i>--}}
                              {{--Existing Purchases--}}
                            {{--</a>--}}
                        {{--</li>--}}

                    </ul>
                </li>
            {{--reports--}}
                <li>
                    <a href="#">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Reports</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{url('supplied_products_report')}}">
                                <i class="fa fa-angle-double-right"></i>
                                Products Supplied
                            </a>
                        </li>

                        <li>
                            <a href="{{url('payment_report')}}">
                                <i class="fa fa-angle-double-right"></i>
                              Purchased Items
                            </a>
                        </li>



                    </ul>
                </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</section>
</aside>