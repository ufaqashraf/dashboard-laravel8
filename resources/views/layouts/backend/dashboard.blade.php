@extends('layouts.backend.app')
<style>
    .canvasjs-chart-credit {
        display: none !important;
    }

</style>
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard overview</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row col-md-12">
                @if ($data->type == 'super_admin')

                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Payment Report</h3>
                        </div>
                        <div class="card-body">
                            <div id="payContainer" style="height: 300px; width: 100%;"></div>
                            <button id="printPay">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">User Registered Overview</h3>
                        </div>
                        <div class="card-body">
                            <div id="pieChart" style="height: 300px; width: 100%;"></div>
                            <button id="printUser">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">HelpDesk Report</h3>
                        </div>
                        <div class="card-body">
                            <div id="helpDeskContainer" style="height: 275px; width: 100%;"></div>
                            <button id="printHelp">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Total Device Allocated</h3>
                        </div>
                        <div class="card-body">
                            <div id="deviceadminContainer" style="height:300px; width:100%"></div>
                            <button id="printadminDevice">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Total Ticket Raise</h3>
                        </div>
                        <div class="card-body">
                            <div id="ticketadminContainer" style="height:300px; width:100%"></div>
                            <button id="printadminTicket">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Total Rules Added</h3>
                        </div>
                        <div class="card-body">
                            <div id="rulesadminContainer" style="height:300px; width:100%"></div>
                            <button id="printadminRules">Print Chart</button>
                        </div>
                    </div>
                @else
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Total Device Allocated</h3>
                        </div>
                        <div class="card-body">
                            <div id="deviceContainer" style="height:300px; width:100%"></div>
                            <button id="printDevice">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Total Ticket Raise</h3>
                        </div>
                        <div class="card-body">
                            <div id="ticketContainer" style="height:300px; width:100%"></div>
                            <button id="printTicket">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Total Rules Added</h3>
                        </div>
                        <div class="card-body">
                            <div id="rulesContainer" style="height:300px; width:100%"></div>
                            <button id="printRules">Print Chart</button>
                        </div>
                    </div>
                    <div class="card card-danger col-md-6" id="dasdfas">
                        <div class="card-header">
                            <h3 class="card-title">Alert & Signals</h3>
                        </div>
                        <div class="card-body" id="printddd">
                            <div id="chartContainer" style="height: 275px; width: 100%;"></div>
                            <button id="printAlert">Print Chart</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($data->type == 'user')
                        <div id="user_order_table" class="card col-12">
                            <div class="card-header">
                                <h3 class="card-title">Order List Overview</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SI #</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Package</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($orders->where('user_id', $data->id) as $order)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ Carbon\Carbon::parse($order->created_at)->isoFormat('MMM Do YYYY, h:mm A') }}
                                                </td>
                                                <td>{{ optional($order->get_user)->f_name }}</td>
                                                <td>{{ $order->package }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->duration }}</td>
                                                <td>
                                                    <button onclick="deleteOrder({{ $order->id }})"
                                                        class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div id="all_order_table" class="card col-12">
                            <div class="card-header">
                                <h3 class="card-title">Order List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SI #</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Package</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($orders as $order)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ Carbon\Carbon::parse($order->created_at)->isoFormat('MMM Do YYYY, h:mm A') }}
                                                </td>
                                                <td>{{ optional($order->get_user)->f_name }}</td>
                                                <td>{{ $order->package }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->duration }}</td>
                                                <td>
                                                    <button onclick="deleteOrder({{ $order->id }})"
                                                        class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

@section('js')
    <script type="text/javascript">
        $(function() {
            $("#example3").DataTable();
            $('#example4').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

        $(function() {
            $("#example5").DataTable();
            $('#example6').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

        function deleteOrder(id) {
            $.ajax({
                url: "{{ route('delete.order') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Order delete successfull.'
                    })
                },
                error: function() {

                    Swal.fire({
                        icon: 'error',
                        title: 'Field required'
                    })
                }
            })
        }

    </script>

    @if ($data->type == 'super_admin')
        <script type="text/javascript">
            // user registered chart

            window.onload = function() {
                var userchart = new CanvasJS.Chart("pieChart", {
                    title: {
                        text: "User Registered Overview"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: {{ $daily }},
                                indexLabel: "Today" + " " + {{ $daily }}
                            },
                            {
                                y: {{ $week }},
                                indexLabel: "This Week" + " " + {{ $week }}
                            },
                            {
                                y: {{ $monthly }},
                                indexLabel: "This Month" + " " + {{ $monthly }}
                            },
                            {
                                y: {{ $yearly }},
                                indexLabel: "This Year" + " " + {{ $yearly }}
                            },
                            {
                                y: {{ $lastyear }},
                                indexLabel: "Last Year" + " " + {{ $lastyear }}
                            }
                        ]
                    }]
                });
                userchart.render();
                document.getElementById("printUser").addEventListener("click", function() {
                    userchart.print();
                });


                //payment chart

                var paymentchart = new CanvasJS.Chart("payContainer", {
                    title: {
                        text: "Payment Report"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: {{ $orderToday }},
                                indexLabel: "Today" + " " + {{ $orderToday }}
                            },
                            {
                                y: {{ $orderMonthly }},
                                indexLabel: "This Month" + " " + {{ $orderMonthly }}
                            },
                            {
                                y: {{ $orderLastMonth }},
                                indexLabel: "Last Month" + " " + {{ $orderLastMonth }}
                            },
                            {
                                y: {{ $orderYearly }},
                                indexLabel: "Yearly" + " " + {{ $orderYearly }}
                            }
                        ]
                    }]
                });
                paymentchart.render();
                document.getElementById("printPay").addEventListener("click", function() {
                    paymentchart.print();
                });
                
                 //device chart

                    var deviceadminchart = new CanvasJS.Chart("deviceadminContainer", {
                        title: {
                            text: "Total Device Allocated",
                            fontFamily: "Impact",
                            fontWeight: "normal"
                        },
    
                        legend: {
                            verticalAlign: "bottom",
                            horizontalAlign: "center"
                        },
                        data: [{
                            //startAngle: 45,
                            indexLabelFontSize: 20,
                            indexLabelFontFamily: "Garamond",
                            indexLabelFontColor: "darkgrey",
                            indexLabelLineColor: "darkgrey",
                            indexLabelPlacement: "outside",
                            type: "doughnut",
                            showInLegend: true,
                            dataPoints: [{
                                    y: {{ $deviceadminToday }},
                                    legendText: {{ $deviceadminToday }},
                                    indexLabel: "Today" + ' ' + {{ $deviceadminToday }}
                                },
                                {
                                    y: {{ $deviceadminThisMonth }},
                                    legendText: {{ $deviceadminThisMonth }},
                                    indexLabel: "This Month" + ' ' + {{ $deviceadminThisMonth }}
                                },
                                {
                                    y: {{ $deviceadminLastMonth }},
                                    legendText: {{ $deviceadminLastMonth }},
                                    indexLabel: "Last Month" + ' ' + {{ $deviceadminLastMonth }}
                                },
                                {
                                    y: {{ $deviceadminYearly }},
                                    legendText: {{ $deviceadminYearly }},
                                    indexLabel: "Year" + ' ' + {{ $deviceadminYearly }}
                                }
                            ]
                        }]
                    });
    
                    deviceadminchart.render();
                    document.getElementById("printadminDevice").addEventListener("click", function() {
                        deviceadminchart.print();
                    });


                //ticket chart

                var ticketadminchart = new CanvasJS.Chart("ticketadminContainer", {
                    title: {
                        text: "Total Ticket Raise"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: {{ $ticketadminToday }},
                                indexLabel: "Today" + " " + {{ $ticketadminToday }}
                            },
                            {
                                y: {{ $ticketadminThisMonth }},
                                indexLabel: "This Month" + " " + {{ $ticketadminThisMonth }}
                            },
                            {
                                y: {{ $ticketadminLastMonth }},
                                indexLabel: "Last Month" + " " + {{ $ticketadminLastMonth }}
                            },
                            {
                                y: {{ $ticketadminYearly }},
                                indexLabel: "Yearly" + " " + {{ $ticketadminYearly }}
                            }
                        ]
                    }]
                });

                ticketadminchart.render();
                document.getElementById("printadminTicket").addEventListener("click", function() {
                    ticketadminchart.print();
                });
                
                
                //rules chart..
                var rulesadminchart = new CanvasJS.Chart("rulesadminContainer", {
                    title: {
                        text: "Total Rules Added"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: {{ $rulesadminToday }},
                                indexLabel: "Today" + " " + {{ $rulesadminToday }}
                            },
                            {
                                y: {{ $rulesadminThisMonth }},
                                indexLabel: "This Month" + " " + {{ $rulesadminThisMonth }}
                            },
                            {
                                y: {{ $rulesadminLastMonth }},
                                indexLabel: "Last Month" + " " + {{ $rulesadminLastMonth }}
                            },
                            {
                                y: {{ $rulesadminYearly }},
                                indexLabel: "Yearly" + " " + {{ $rulesadminYearly }}
                            }
                        ]
                    }]
                });

                rulesadminchart.render();
                document.getElementById("printadminRules").addEventListener("click", function() {
                    rulesadminchart.print();
                });
                
                //help desk chart
                var helpDesk = new CanvasJS.Chart("helpDeskContainer", {
                    theme: "light2",
                    title: {
                        text: "HelpDesk Report"
                    },
                    data: [{
                        type: "column",
                        dataPoints: [{
                                label: "Receive"+" "+{{ $receive }},
                                y: {{ $receive }}
                            },
                            {
                                label: "Solved"+" "+{{$solve}},
                                y: {{$solve}}
                            },
                            {
                                label: "Delete"+" "+{{$delete}},
                                y: {{$delete}}
                            }
                        ]
                    }]
                });

                helpDesk.render();
                document.getElementById("printHelp").addEventListener("click", function() {
                    helpDesk.print();
                });
                

            }

        </script>
        
    @endif

    @if ($data->type == 'user')

        <script>
                window.onload = function() {
                     //device chart

                    var devicechart = new CanvasJS.Chart("deviceContainer", {
                        title: {
                            text: "Total Device Allocated",
                            fontFamily: "Impact",
                            fontWeight: "normal"
                        },
    
                        legend: {
                            verticalAlign: "bottom",
                            horizontalAlign: "center"
                        },
                        data: [{
                            //startAngle: 45,
                            indexLabelFontSize: 20,
                            indexLabelFontFamily: "Garamond",
                            indexLabelFontColor: "darkgrey",
                            indexLabelLineColor: "darkgrey",
                            indexLabelPlacement: "outside",
                            type: "doughnut",
                            showInLegend: true,
                            dataPoints: [{
                                    y: {{ $deviceToday }},
                                    legendText: {{ $deviceToday }},
                                    indexLabel: "Today" + ' ' + {{ $deviceToday }}
                                },
                                {
                                    y: {{ $deviceThisMonth }},
                                    legendText: {{ $deviceThisMonth }},
                                    indexLabel: "This Month" + ' ' + {{ $deviceThisMonth }}
                                },
                                {
                                    y: {{ $deviceLastMonth }},
                                    legendText: {{ $deviceLastMonth }},
                                    indexLabel: "Last Month" + ' ' + {{ $deviceLastMonth }}
                                },
                                {
                                    y: {{ $deviceYearly }},
                                    legendText: {{ $deviceYearly }},
                                    indexLabel: "Year" + ' ' + {{ $deviceYearly }}
                                }
                            ]
                        }]
                    });
    
                    devicechart.render();
                    document.getElementById("printDevice").addEventListener("click", function() {
                        devicechart.print();
                    });
                    
                    //alert signals chart
                    
                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light2",
                        title: {
                            text: "Alert & Signals"
                        },
                        data: [{
                            type: "column",
                            dataPoints: [{
                                    label: "Today",
                                    y: 10
                                },
                                {
                                    label: "This Month",
                                    y: 15
                                },
                                {
                                    label: "Last Month",
                                    y: 25
                                },
                                {
                                    label: "Year",
                                    y: 30
                                }
                            ]
                        }]
                    });

                    chart.render();
                    document.getElementById("printAlert").addEventListener("click", function() {
                        chart.print();
                    });
                    
                    
                //ticket chart

                var ticketchart = new CanvasJS.Chart("ticketContainer", {
                    title: {
                        text: "Total Ticket Raise"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: {{ $ticketToday }},
                                indexLabel: "Today" + " " + {{ $ticketToday }}
                            },
                            {
                                y: {{ $ticketThisMonth }},
                                indexLabel: "This Month" + " " + {{ $ticketThisMonth }}
                            },
                            {
                                y: {{ $ticketLastMonth }},
                                indexLabel: "Last Month" + " " + {{ $ticketLastMonth }}
                            },
                            {
                                y: {{ $ticketYearly }},
                                indexLabel: "Yearly" + " " + {{ $ticketYearly }}
                            }
                        ]
                    }]
                });

                ticketchart.render();
                document.getElementById("printTicket").addEventListener("click", function() {
                    ticketchart.print();
                });
                
                
                //rules chart..
                var ruleschart = new CanvasJS.Chart("rulesContainer", {
                    title: {
                        text: "Total Rules Added"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: {{ $rulesToday }},
                                indexLabel: "Today" + " " + {{ $rulesToday }}
                            },
                            {
                                y: {{ $rulesThisMonth }},
                                indexLabel: "This Month" + " " + {{ $rulesThisMonth }}
                            },
                            {
                                y: {{ $rulesLastMonth }},
                                indexLabel: "Last Month" + " " + {{ $rulesLastMonth }}
                            },
                            {
                                y: {{ $rulesYearly }},
                                indexLabel: "Yearly" + " " + {{ $rulesYearly }}
                            }
                        ]
                    }]
                });

                ruleschart.render();
                document.getElementById("printRules").addEventListener("click", function() {
                    ruleschart.print();
                });
            }

        </script>

    @endif
@endsection
@endsection
