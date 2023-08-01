@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="{{ asset('css/ranking.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="{{asset('images/logo.png')}}">
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{ asset('/admin/home')}}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-cart'></i>
                    <span class="text">Products</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/status') }}">
                    <i class='bx bxs-cart'></i>
                    <span class="text">Product Status</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Customer Lists</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ url('/ranking') }}">
                    <i class='bx bxs-bar-chart-alt-2'></i>
                    <span class="text">Ranking</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->

        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a href="#">
                        <i class='bx bxs-user'></i>
                        <span class="text">View Profile</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Ranking</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Ranking</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="{{ asset('/admin/home')}}">Home</a>
                        </li>
                    </ul>
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
                            <h3>Top Sales Products</h3>
                            <i class='bx bx-plus'></i>
                            <i class='bx bx-filter'></i>
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
                                <tr>
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
                            <i class='bx bx-search'></i>
                            <i class='bx bx-filter'></i>
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
</body>

</html>
