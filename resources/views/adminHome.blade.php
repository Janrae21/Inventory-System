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

                            @foreach ($recentAddedProducts as $product)
                                <tr>
                                    <td>{{ $product->ItemsName }}</td>
                                    <td>{{ $product->StocksPurchased }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
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

                                @foreach ($recentProducts as $product)
                                    <tr>
                                        <td>{{ $product->item_name }}</td>
                                        <td>{{ $product->quantity_sold }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->created_at -> format('Y-m-d')}}</td>
                                    </tr>
                                @endforeach

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
        return order.quantity_sold;
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
        },
        options: {
            scales: {
            y: {
                beginAtZero: true,
                ticks: {
                callback: function(value) {
                    if (value % 1 === 0) {
                    return value;
                    }
                }
                }
            }
            }
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