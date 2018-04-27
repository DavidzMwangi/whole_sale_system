@extends('layouts.main')
@section('style')
    <link href="{{asset('template/vendors/charts/circliful/jquery.circliful.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/css/pages/charts.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('template/css/pages/jscharts.css')}}" />

@endsection
@section('content')




    <section class="content-header">
        <h1>Animating Charts</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Home
                </a>
            </li>
            <li>Charts</li>
            <li class="active">Animating Charts</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="vector-circle" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Circular Charts
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-3 col-sm-6 center">
                                <span id="myStathalf" data-dimension="210" data-text="{{round($paid_purchases_percentage)}}% Complete Purchases" data-fontsize="18" data-percent="{{round($paid_purchases_percentage)}}" data-fgcolor="#60BA3B" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></span>
                                {{--<span id="myStathalf" data-dimension="210" data-text="{{$paid_purchases_percentage}}% Views" data-fontsize="18" data-percent="{{$paid_purchases_percentage}}" data-fgcolor="#60BA3B" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></span>--}}
                            </div>
                            <div class="col-lg-3 col-sm-6  center">
                                <span id="myStat" data-dimension="210" data-text="75% Subscribes" data-info="Sales" data-fontsize="15" data-percent="75" data-fgcolor="#E4664B" data-bgcolor="#eee" data-fill="#ddd"></span>
                            </div>
                            <div class="col-lg-3  col-sm-6 center">
                                <span id="myStathalf2" data-dimension="210" data-text="25% Sales" data-info="Subscribes" data-fontsize="18" data-percent="25" data-fgcolor="#3FB0DC" data-bgcolor="#eee" data-type="half" data-icon="fa-task"></span>
                            </div>
                            <div class="col-lg-3 col-sm-4 center">
                                <span id="myStat2" data-dimension="210" data-text="85% New Users" data-info="New Users" data-fontsize="15" data-percent="85" data-fgcolor="#F79646" data-bgcolor="#eee"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" hidden>
            <div class="col-lg-6">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Animation Wave
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div id="chart4" class="animation-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Animation Area
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div id="chart3" class="animation-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row" hidden>
            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Animation On Points
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div id="chart2" class="animation-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Animation on Bar Chart
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div id="chart1" class="animation-chart"></div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Bar Chart for Product and Purchase In year {{date('Y')}}
                        </h4>
                        <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-offset-8">
                            <label >Purchases</label>  <button class="btn" style="background: #67C5DF">Color </button></br>
                        </div>
                        <div >
                            <br>
                        </div>
                        <div class="col-md-offset-8">
                            <label>Products</label>   <button class="btn" style="background: #F89A14">Color</button>
                        </div>
                        <div>
                            <canvas id="bar-chart" width="800" height="300" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                          Purchase Chart For Year {{date('Y')}}
                        </h4>
                        <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="line-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    @endsection

@section('script')
    <script src="{{asset('template/vendors/animationcharts/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/vendors/animationcharts/jquery.flot.animator.min.js')}}" type="text/javascript"></script>
    <script type="application/javascript">


        (function ($) {

            $.fn.circliful = function (options, callback) {

                var settings = $.extend({
                    // These are the defaults.
                    fgcolor: "#556b2f",
                    bgcolor: "#eee",
                    fill: false,
                    width: 15,
                    dimension: 200,
                    fontsize: 15,
                    percent: 50,
                    animationstep: 1.0,
                    iconsize: '20px',
                    iconcolor: '#999',
                    border: 'default',
                    complete: null
                }, options);

                return this.each(function () {
                    var customSettings = ["fgcolor", "bgcolor", "fill", "width", "dimension", "fontsize", "animationstep", "endPercent", "icon", "iconcolor", "iconsize", "border"];
                    var customSettingsObj = {};
                    var icon = '';
                    var endPercent = 0;
                    var obj = $(this);
                    var fill = false;
                    var text, info;

                    obj.addClass('circliful');

                    checkDataAttributes(obj);

                    if (obj.data('text') != undefined) {
                        text = obj.data('text');

                        if (obj.data('icon') != undefined) {
                            icon = $('<i></i>')
                                .addClass('fa ' + $(this).data('icon'))
                                .css({
                                    'color': customSettingsObj.iconcolor,
                                    'font-size': customSettingsObj.iconsize
                                });
                        }

                        if (obj.data('type') != undefined) {
                            type = $(this).data('type');

                            if (type == 'half') {
                                addCircleText(obj, 'circle-text-half', (customSettingsObj.dimension / 1.45));
                            } else {
                                addCircleText(obj, 'circle-text', customSettingsObj.dimension);
                            }
                        } else {
                            addCircleText(obj, 'circle-text', customSettingsObj.dimension);
                        }
                    }

                    if ($(this).data("total") != undefined && $(this).data("part") != undefined) {
                        var total = $(this).data("total") / 100;

                        percent = (($(this).data("part") / total) / 100).toFixed(3);
                        endPercent = ($(this).data("part") / total).toFixed(3)
                    } else {
                        if ($(this).data("percent") != undefined) {
                            percent = $(this).data("percent") / 100;
                            endPercent = $(this).data("percent")
                        } else {
                            percent = settings.percent / 100
                        }
                    }

                    if ($(this).data('info') != undefined) {
                        info = $(this).data('info');

                        if ($(this).data('type') != undefined) {
                            type = $(this).data('type');

                            if (type == 'half') {
                                addInfoText(obj, 0.9);
                            } else {
                                addInfoText(obj, 1.25);
                            }
                        } else {
                            addInfoText(obj, 1.25);
                        }
                    }

                    $(this).width(customSettingsObj.dimension + 'px');

                    var canvas = $('<canvas></canvas>').attr({
                        width: customSettingsObj.dimension,
                        height: customSettingsObj.dimension
                    }).appendTo($(this)).get(0);

                    var context = canvas.getContext('2d');
                    var x = canvas.width / 2;
                    var y = canvas.height / 2;
                    var degrees = customSettingsObj.percent * 360.0;
                    var radians = degrees * (Math.PI / 180);
                    var radius = canvas.width / 2.5;
                    var startAngle = 2.3 * Math.PI;
                    var endAngle = 0;
                    var counterClockwise = false;
                    var curPerc = customSettingsObj.animationstep === 0.0 ? endPercent : 0.0;
                    var curStep = Math.max(customSettingsObj.animationstep, 0.0);
                    var circ = Math.PI * 2;
                    var quart = Math.PI / 2;
                    var type = '';
                    var fireCallback = true;

                    if ($(this).data('type') != undefined) {
                        type = $(this).data('type');

                        if (type == 'half') {
                            startAngle = 2.0 * Math.PI;
                            endAngle = 3.13;
                            circ = Math.PI * 1.0;
                            quart = Math.PI / 0.996;
                        }
                    }

                    /**
                     * adds text to circle
                     *
                     * @param obj
                     * @param cssClass
                     * @param lineHeight
                     */
                    function addCircleText(obj, cssClass, lineHeight) {
                        $("<span></span>")
                            .appendTo(obj)
                            .addClass(cssClass)
                            .text(text)
                            .prepend(icon)
                            .css({
                                'line-height': 250 + 'px',
                                'font-size': customSettingsObj.fontsize + 'px'
                            });
                    }

                    /**
                     * adds info text to circle
                     *
                     * @param obj
                     * @param factor
                     */
                    function addInfoText(obj, factor) {
                        $('<span></span>')
                            .appendTo(obj)
                            .addClass('circle-info-half')
                            .css(
                                'line-height', (customSettingsObj.dimension * factor) + 'px'
                            );
                    }

                    /**
                     * checks which data attributes are defined
                     * @param obj
                     */
                    function checkDataAttributes(obj) {
                        $.each(customSettings, function (index, attribute) {
                            if (obj.data(attribute) != undefined) {
                                customSettingsObj[attribute] = obj.data(attribute);
                            } else {
                                customSettingsObj[attribute] = $(settings).attr(attribute);
                            }

                            if (attribute == 'fill' && obj.data('fill') != undefined) {
                                fill = true;
                            }
                        });
                    }

                    /**
                     * animate foreground circle
                     * @param current
                     */
                    function animate(current) {
                        context.clearRect(0, 0, canvas.width, canvas.height);

                        context.beginPath();
                        context.arc(x, y, radius, endAngle, startAngle, false);

                        context.lineWidth = customSettingsObj.width + 1;

                        context.strokeStyle = customSettingsObj.bgcolor;
                        context.stroke();

                        if (fill) {
                            context.fillStyle = customSettingsObj.fill;
                            context.fill();
                        }

                        context.beginPath();
                        context.arc(x, y, radius, -(quart), ((circ) * current) - quart, false);

                        if (customSettingsObj.border == 'outline') {
                            context.lineWidth = customSettingsObj.width + 13;
                        } else if(customSettingsObj.border == 'inline') {
                            context.lineWidth = customSettingsObj.width - 13;
                        }

                        context.strokeStyle = customSettingsObj.fgcolor;
                        context.stroke();

                        if (curPerc < endPercent) {
                            curPerc += curStep;
                            requestAnimationFrame(function () {
                                animate(Math.min(curPerc, endPercent) / 100);
                            }, obj);
                        }

                        if(curPerc == endPercent && fireCallback && typeof(options) != "undefined") {
                            if($.isFunction( options.complete )) {
                                options.complete();

                                fireCallback = false;
                            }
                        }
                    }

                    animate(curPerc / 100);

                });
            };
        }(jQuery));
    </script>

{{--    <script src="{{asset('template/vendors/charts/circliful/jquery.circliful.min.js')}}"></script>--}}
    <script src="{{asset('template/vendors/charts/jquery.flot.resize.js')}}" language="javascript" type="text/javascript" ></script>
{{--    <script src="{{asset('template/js/pages/animation-chart.js')}}"></script>--}}
    <script type="application/javascript">

        var d8 = [
            [2, 5],
            [3, 6],
            [4, 8],
            [5, 6],
            [6, 2],
            [7, 5],
            [8, 4],
            [9, 1],
            [10, 4],
            [11, 8],
            [12, 5],
            [13, 6],
            [14, 4]
        ];
        var d9 = [
            [2, 4.5],
            [2.5, 5],
            [4.5, 8],
            [6.5, 2],
            [7.5, 5],
            [9.5, 1],
            [10.5, 4],
            [11.5, 8],
            [12.5, 5],
            [13.5, 6],
            [14.5, 4],
            [15, 3]
        ];
        var plot1 = $.plotAnimator($("#chart1"), [{
            data: d8,
            bars: {
                barWidth: 0.5,
                show: true,
                fill: true,
                fillColor: '#F89A14',
            }
        }, {
            data: d9,
            lines: {
                lineWidth: 3,
                fill: true,
                fillColor: 'rgba(239,111,108,.2)'
            },
            animator: {
                start: $("#start").val(),
                steps: $("#steps").val(),
                duration: $("#duration").val(),
                direction: $("#dir").val()
            }
        }]);
        //animation on bar chart end
        var d0 = [
            [2, 5],
            [4, 8],
            [6, 2],
            [7, 3],
            [10, 4],
            [12, 5],
            [13, 6],
            [14, 4]
            //     [2, 5],
            // [4, 8],
            // [6, 2],
            // [7, 3],
            // [10, 4],
            // [12, 5],
            // [13, 6],
            // [14, 4]
        ];
        var d1 = [
            [2, 5],
            [4, 8],
            [6, 2],
            [7, 3],
            [10, 4],
            [12, 5],
            [13, 6],
            [14, 4]
        ];
        var plot2 = $.plotAnimator($("#chart2"), [{
            data: d1,
            animator: {
                steps: 26,
                duration: 1500,
                start: 0
            },
            points: {
                show: true,
                fill: true,
                radius: 10,
                fillColor: "#418bca"
            },
            label: "Bars"
        }], {
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: '#ddd',
                borderWidth: 0,
                labelMargin: 5,
                backgroundColor: '#fff'
            }
        });
        setTimeout(function() {
            plot2 = $.plotAnimator($("#chart2"), [{
                data: d1,
                points: {
                    show: true,
                    fill: true,
                    radius: 5,
                    fillColor: "rgba(239,111,108,0.5)"
                },
                label: "Points",
                color: 'rgba(239,111,108,0.5)'
            }, {
                data: d0,
                animator: {
                    steps: 136,
                    duration: 1500,
                    start: 0
                },
                lines: {
                    show: true,
                    fill: true,
                    fillColor: "rgba(1,188,140,0.5)"
                },
                label: "Evolution",
                color: '#67C5DF'
            }], {
                grid: {
                    hoverable: true,
                    clickable: true,
                    borderColor: '#ddd',
                    borderWidth: 0,
                    labelMargin: 5,
                    backgroundColor: '#fff'
                }
            });

        }, 3000);

        //animation on points ends
        var d5 = [
            [1, 4],
            [2, 2],
            [4, 4],
            [6, 2],
            [8, 4],
            [10, 2],
            [15, 4],
            [20, 2]
        ];
        var d6 = [
            [1, 3],
            [20, 3]
        ];
        var plot3 = $.plotAnimator($("#chart3"), [{
            data: d5,
            animator: {
                steps: 136,
                duration: 2000,
                start: 0
            },
            lines: {
                show: true,
                fill: true,
                fillColor: 'rgba(239,111,108,0.5)'
            },
            label: "Fill this",
            color: 'rgba(239,111,108,0.5)'
        }, {
            data: d6,
            lines: {
                show: true,
                fill: false
            },
            label: "Standard Values",
            color: '#67C5DF'
        }], {
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: '#ddd',
                borderWidth: 0,
                labelMargin: 5,
                backgroundColor: '#fff'
            }
        });

        //animation area ends
        var d2 = [];
        for (var i = 0; i < 20.1; i += 0.1) d2.push([i, Math.sin(i)]);
        var d3 = [
            [0, 0],
            [20, 0]
        ];
        var plot4 = $.plotAnimator($("#chart4"), [{
            data: d2,
            animator: {
                steps: 136,
                duration: 3000,
                start: 0
            },
            lines: {
                show: true,
                fill: true,
                fillColor: 'rgba(65,139,202,0.8)'
            },
            label: "sin(x)",
            color: '#418bca'
        }, {
            data: d3,
            lines: {
                show: true,
                fill: false,
                linecolor: '#fafafa',

            }
        }, {
            data: d2,
            lines: {
                show: true,
                fill: false
            }
        }], {
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: '#ddd',
                borderWidth: 0,
                labelMargin: 5,
                backgroundColor: '#fff'

            }
        });

        //animation wave ends

        $(document).ready(function() {
            $('#myStathalf').circliful();
            $('#myStat').circliful();
            $('#myStathalf2').circliful();
            $('#myStat2').circliful();
        });
    </script>
    {{--<script type="application/javascript">--}}

        <script src="{{asset('template/vendors/jscharts/Chart.js')}}"></script>
{{--    <script src="{{asset('template/js/pages/chartjs.js')}}"></script>--}}

    <script type="application/javascript">
        $(function () {

            //start line chart
            var lineChartData = {
                labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets : [
                    {
                        fillColor : "rgba(65,139,202,0.5)",
                        strokeColor : "rgba(65,139,202,0.5)",
                        pointColor : "rgba(65,139,202,0.5)",
                        pointStrokeColor : "#fff",
                        data : [0,0,0,0,0,0,0,0,0,0,0,0]

                    },
                    {
                        fillColor : "rgba(239,111,108,0.5)",
                        strokeColor : "rgba(239,111,108,0.5)",
                        pointColor : "rgba(239,111,108,0.5)",
                        pointStrokeColor : "#fff",
                        data : ['{{$month_purchases[1]}}','{{$month_purchases[2]}}','{{$month_purchases[3]}}','{{$month_purchases[4]}}',{{$month_purchases[5]}},{{$month_purchases[6]}},{{$month_purchases[7]}},{{$month_purchases[8]}},{{$month_purchases[9]}},{{$month_purchases[10]}},{{$month_purchases[11]}},{{$month_purchases[12]}}]
                    }
                ]

            };
            function draw(){

                var selector = '#line-chart';

                $(selector).attr( 'width', $(selector).parent().width() )
                var myLine = new Chart(document.getElementById("line-chart").getContext("2d")).Line(lineChartData);
            }
            $(window).resize( draw );
            draw()
            //endline chart

            //start bar chart
            var barChartData = {
                labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets : [
                    {
                        fillColor : "#67C5DF",
                        strokeColor : "#67C5DF",
                        data : ['{{$month_purchases[1]}}','{{$month_purchases[2]}}','{{$month_purchases[3]}}','{{$month_purchases[4]}}',{{$month_purchases[5]}},{{$month_purchases[6]}},{{$month_purchases[7]}},{{$month_purchases[8]}},{{$month_purchases[9]}},{{$month_purchases[10]}},{{$month_purchases[11]}},{{$month_purchases[12]}}]

                        // data : [95,59,90,81,56,55,40,30,50,20,80,99]
                    },
                    {
                        fillColor : "#F89A14",
                        strokeColor : "#F89A14",
                        data : ['{{$month_products[1]}}','{{$month_products[2]}}','{{$month_products[3]}}','{{$month_products[4]}}',{{$month_products[5]}},{{$month_products[6]}},{{$month_products[7]}},{{$month_products[8]}},{{$month_products[9]}},{{$month_products[10]}},{{$month_products[11]}},{{$month_products[12]}}]

                        // data : [28,48,40,19,96,27,40,60,30,90,50,87]
                    }
                ]

            };
            function draw1(){

                var selector = '#bar-chart';

                $(selector).attr( 'width', $(selector).parent().width() )
                var myBar = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
            }
            $(window).resize( draw1 );
            draw1()


            //end bar chart

            //start radar chart
            var radarChartData = {
                labels : ["Eating","Drinking","Sleeping","Designing","Coding","Partying","Running"],
                datasets : [
                    {
                        fillColor : "rgba(248,154,20,0.5)",
                        strokeColor : "rgba(248,154,20,0.5)",
                        pointColor : "rgba(248,154,20,0.5)",
                        pointStrokeColor : "#fff",
                        data : [65,59,90,81,56,55,40]
                    },
                    {
                        fillColor : "rgba(1,188,140,0.5)",
                        strokeColor : "rgba(1,188,140,0.5)",
                        pointColor : "rgba(1,188,140,0.5)",
                        pointStrokeColor : "#fff",
                        data : [28,48,40,19,96,27,100]
                    }
                ]

            }
            function draw2(){

                var selector = '#radar-chart';

                $(selector).attr( 'width', $(selector).parent().width() )
                var myRadar = new Chart(document.getElementById("radar-chart").getContext("2d")).Radar(radarChartData,{scaleShowLabels : false, pointLabelFontSize : 10});
            }
            $(window).resize( draw2 );
            draw2()

            //end  radar chart

            //start polar area chart
            var chartData = [
                {
                    value : Math.random(),
                    color: "#01BC8C"
                },
                {
                    value : Math.random(),
                    color: "#F89A14"
                },
                {
                    value : Math.random(),
                    color: "#418BCA"
                },
                {
                    value : Math.random(),
                    color: "#EF6F6C"
                },
                {
                    value : Math.random(),
                    color: "#A9B6BC"
                },
                {
                    value : Math.random(),
                    color: "#67C5DF"
                }
            ];
            function draw3(){

                var selector = '#polar-area-chart';

                $(selector).attr( 'width', $(selector).parent().width() )
                var myPolarArea = new Chart(document.getElementById("polar-area-chart").getContext("2d")).PolarArea(chartData);
            }
            $(window).resize( draw3 );
            draw3()

            //end polar area chart

            //start pie chart
            var pieData = [
                {
                    value: 30,
                    color:"#EF6F6C"
                },
                {
                    value : 50,
                    color : "#01BC8C"
                },
                {
                    value : 100,
                    color : "#418BCA"
                }

            ];
            function draw4(){

                var selector = '#pie-chart';

                $(selector).attr( 'width', $(selector).parent().width() )
                var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);
            }
            $(window).resize( draw4 );
            draw4()

            //end pie chart

            //start doughnut chart
            var doughnutData = [
                {
                    value: 30,
                    color:"#418BCA"
                },
                {
                    value : 50,
                    color : "#01BC8C"
                },
                {
                    value : 100,
                    color : "#EF6F6C"
                },
                {
                    value : 40,
                    color : "#A9B6BC"
                },
                {
                    value : 120,
                    color : "#F89A14"
                }

            ];
            function draw5(){

                var selector = '#doughnut-chart';

                $(selector).attr( 'width', $(selector).parent().width() )
                var myDoughnut = new Chart(document.getElementById("doughnut-chart").getContext("2d")).Doughnut(doughnutData);
            }
            $(window).resize( draw5 );
            draw5()


            //end doughnut chart

        });

    </script>
    @endsection