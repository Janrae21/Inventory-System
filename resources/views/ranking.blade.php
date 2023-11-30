@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/ranking.css') }}" rel="stylesheet">
        <title>Ranking</title>
    </head>

    <body>
        @component('components.SidebarComponent')
        @endcomponent

        <!-- CONTENT -->
        <section id="content">
            <!-- NAVBAR -->

            @component('components.NavbarComponent')
            @endcomponent
            <!-- NAVBAR -->

            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Ranking</h1>
                    </div>
                    <a href="#" class="btn-download">
                        <i class='bx bxs-cloud-download'></i>
                        <span class="text">Download Excel</span>
                    </a>
                </div>
                <div class="table-data">

                    <div class="todo">
                        <div class="order">
                            <div class="head">
                               <h3>Monthly Sold Products</h3> 
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Top</th>
                                        <th>Product Name</th>
                                        <th>Monthly Sold Items</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($monthlyQuantitySold as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->item_name }}</td>
                        <td>{{ $product->total_quantity_sold }}</td>
                    </tr>
                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="order">
                        <div class="charts">
                            <div class="charts-card">
                                <p class="chart-title">Top 5 Sales Product</p>
                                <canvas id="bar-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>Top Customer</h3>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Top</th>
                                        <th>Customer Name</th>
                                        <th>Total Number of Purchased Items</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topCustomers as $index => $customer)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $customer->customer_name }}</td>
                                        <td>{{ $customer->total_quantity_sold }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="order">
                            <div class="charts">
                                <div class="charts-card">
                                    <p class="chart-title">Top 5 Customer</p>
                                    <canvas id="chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <!-- MAIN -->
        </section>

        <script>
                var sales = {!! $ordersRank !!};

                var labels = sales.map(function (ranking) {
                    return ranking.category;
                });

                var data = sales.map(function (ranking) {
                return ranking.quantity_sold;
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
        <script>
        // Top Customer Chart
            var customerSales = {!! $topCustomers !!};
            var customerLabels = customerSales.map(function (ranking) {
                return ranking.customer_name;
            });
            var customerData = customerSales.map(function (ranking) {
                return ranking.total_quantity_sold;
            });
            new Chart(document.getElementById("chart"), {
                type: "bar",
                data: {
                    labels: customerLabels,
                    datasets: [{
                        label: "Count",
                        data: customerData,
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="{{ asset('js/ranking.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </body>

    </html>
