@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <title>Dashboard</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="{{asset('images/logo.png')}}">
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ asset('/admin/home')}}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="dropdown-btn">
                <a href="{{ url('#') }}">
                    <i class='bx bxs-cart'></i>
                    <span class="text">Product</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('/pisowifi') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Pisowifi</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('/router') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Router</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('#') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Parts Of Pisonet</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('/EloadingPart') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Eloading Parts</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('/Eloading') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Eloading</span>
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
            <li>
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
                    <h1>Piso WiFi</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Piso WiFi</a>
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
                <div class="order">
                    <div class="head">
                        <h3>Piso WiFi</h3>
                        <i class='bx bx-plus-circle' style="font-size:24px; color:green;">Add</i>
                        <i class='bx bx-minus-circle' style="font-size:24px; color:red;">Remove</i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Stocks Purchased</th>
                                <th>Actual Stocks <br> (Based on actual <br> checking(EDUD))</th>
                                <th>Damage or Missing <br>or for Testing</th>
                                <th>Remaining Stocks</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>

                                    <p>Product Name</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Product Name</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Product Name</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Product Name</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Product Name</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn">
                <button type="button" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
            </div>
        </main>

        <!-- MAIN -->
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- CONTENT -->
    <script src="{{ asset('js/pisowifi.js') }}"></script>

</body>

</html>