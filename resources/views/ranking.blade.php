@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                                {{-- <h3>Top Sales Products</h3> --}}
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
                                    <tr>
                                        <td>1</td>
                                        <td>Piso Wifi</td>
                                        <td>54</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>E-Loading Machine</td>
                                        <td>48</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Piso Wifi</td>
                                        <td>45</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Cellphone</td>
                                        <td>41</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>E-Loading Parts</td>
                                        <td>37</td>
                                    </tr>
                                    <tr>

                                        <td>6</td>
                                        <td>Piso Wifi</td>
                                        <td>35</td>
                                    </tr>
                        0            <tr>
                                        <td>7</td>
                                        <td>E-Loading Machine</td>
                                        <td>32</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Piso Wifi</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Cellphone</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>E-Loading Parts</td>
                                        <td>21</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="order">
                        <div class="charts">
                            <div class="charts-card">
                                <p class="chart-title">Top 5 Sales Product</p>
                                <div id="bar-chart"></div>
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
                                    <tr>
                                        <td>1</td>
                                        <td>Seth Obenita</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Rogina Rolloque</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Mary Joy Reambonanza</td>
                                        <td>11</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>John Doe</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jean Ros</td>
                                        <td>5</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="order">
                            <div class="charts">
                                <div class="charts-card">
                                    <p class="chart-title">Top 5 Customer</p>
                                    <div id="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <!-- MAIN -->
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="{{ asset('js/ranking.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </body>

    </html>
