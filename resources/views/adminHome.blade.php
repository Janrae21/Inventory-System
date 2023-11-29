@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <title>Dashboard</title>
</head>

<body>
    <!-- SIDEBAR -->
    @component('components.SidebarComponent')
    @endcomponent
    <!-- <section id="sidebar-dashboard">
                        <a href="#" class="brand">
                            <img src="{{ asset('images/logo.png') }}">
                        </a>
                        <ul class="side-menu top">
                            <li class="active">
                                <a href="{{ asset('/admin/home') }}">
                                    <i class='bx bxs-dashboard'></i>
                                    <span class="text">Dashboard</span>
                                </a>
                            </li>

                            <li class="dropdown-btn">
                                <a href="{{ url('#') }}">
                                    <i class='bx bxs-cart'></i>
                                    <span class="text">Product</span>
                                </a>
                            <li class="drop-item">
                                <a href="{{ url('/pisowifi-parts-accessories') }}">
                                    <span class="text">Pisowifi Parts & Accessories</span>
                                </a>
                            </li>
                            <li class="drop-item">
                                <a href="{{ url('/packaging-monitoring') }}">
                                    <span class="text">Packaging Monitoring</span>
                                </a>
                            </li>
                            <li class="drop-item">
                                <a href="{{ url('/Parts-of-eloading') }}">
                                    <span class="text">Parts Of Eloading</span>
                                </a>
                            </li>
                            <li class="drop-item">
                                <a href="{{ url('/eloading-best-seller') }}">
                                    <span class="text">Eloading Best Seller</span>
                                </a>
                            </li>
                            <li class="drop-item">
                                <a href="{{ url('/physical-store-computer-stocks-monitoring') }}">

                                    <span class="text">Physical Store Computer Stocks Monitoring</span>
                                </a>
                            </li>
                            </li>
                            <li>
                                <a href="{{ url('/status') }}">
                                    <i class='bx bx-stats'></i>
                                    <span class="text">Product Status</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('/customer') }}">
                                    <i class='bx bxs-group'></i>
                                    <span class="text">Customer Lists</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/ranking') }}">
                                    <i class='bx bxs-bar-chart-alt-2'></i>
                                    <span class="text">Ranking</span>
                                </a>
                            </li>
                        </ul>
                    </section>
                    SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        @component('components.NavbarComponent')
        @endcomponent

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download Excel</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>{{$thisMonthOrder}}</h3>
                        <p>Total Monthly Order</p>
                    </span>
                </li>

                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>{{$Total_Purchased_Orders}}</h3>
                        <p>Total Purchased Products</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>{{ $customers }}</h3>
                        <p>Total List of New Customer</p>
                    </span>
                </li>
            </ul>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>{{$todayOrder}}</h3>
                        <p>Purchased/Day</p>
                    </span>
                </li>
                <li>

                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>{{ $customers }}</h3>
                        <p>Total Customers</p>
                    </span>
                </li>
            </ul>
            <div class="table-data">
                <div class="order">
                    <div class="charts">
                        <div class="charts-card">
                            <p class="chart-title">Sales Data</p>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="todo">
                    <div class="order">
                        <div class="head">
                            <h3>Recently Added Products</h3>
                        </div>
                        <table>


                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Date Purchased</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>
                                    <p>Test
                                    <p>
                                <td>Test</td>
                                <td>Test</td>

                                </td>
                            </tr>
                        </table>
                        <br>

                    </div>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Recently Purchased Products</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Date Purchased</th>

                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach ($productStatus as $item)
                                <tr>
                                    <td> {{ !is_null($item->customer) ? $item->customer->name : '' }} </td>
                                    <td>
                                        <p>{{ $item->item_name }}</p>
                                    </td>
                                    <td> {{ $item->quantity_sold }} </td>
                                    <td> {{ $item->category }} </td>
                                    @endforeach --}}

                            </tbody>
                        </table>
                        <br>

                    </div>
                </div>
        </main>
        <!-- MAIN -->
    </section>
    <script>
        var sales = {!! $orders !!};

        var labels = sales.map(function (order) {
            return order.category;
        });

        var data = sales.map(function (order) {
            return order.count;
        });

        new Chart(document.getElementById("bar-chart"), {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Count",
                    data: data,
                    fill: false,
                    backgroundColor: ["#246dec", "#cc3c43", "#367952", "#f5b74f", "#4f35a1"]
                }]
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/http-client/4.3.1/http-client.min.js"
        integrity="sha512-aUW0cZ27r9aV+oMky81TH0hgTMD+NEPaDFM1BR9b6sOR6vsxpmJHbtwQMfCbekXh83CU8R5nWX+pVDYptoK5wQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- CONTENT -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>