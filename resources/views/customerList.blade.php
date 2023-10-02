@extends('layouts.app')

@section('content')

    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
        <title>Customer-List</title>
    </head>

    <body>
        <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="#" class="brand">
                <img src="{{ asset('images/logo.png') }}">
            </a>
            <ul class="side-menu top">
                <li>
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
                    <a href="{{ url('physical-store-computer-stocks-monitoring') }}">
                        <!-- <i class='bx bxs-cart'></i> -->
                        <span class="text">Pisowifi Parts & Accessories</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/packaging-monitoring') }}">
                        <!-- <i class='bx bxs-cart'></i> -->
                        <span class="text">Packaging Monitoring</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/Parts-of-eloading') }}">
                        <!-- <i class='bx bxs-cart'></i> -->
                        <span class="text">Parts Of Eloading</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/eloading-best-seller') }}">
                        <!-- <i class='bx bxs-cart'></i> -->
                        <span class="text">Eloading Best Seller</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/pisowifi-parts-accessories') }}">
                        <!-- <i class='bx bxs-cart'></i> -->
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
                <li class="active">
                    <a href="{{ url('/customer') }}">
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

                <form action="#">
                    <div class="form-input">

                    </div>
                </form>
                <input type="checkbox" id="switch-mode" hidden>
                <label for="switch-mode" class="switch-mode"></label>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="#">
                            <i class='bx bxs-user'></i>
                            <span class="text">View Profile</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
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
                        <h1>Customer Lists</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Customer Lists</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="{{ url('/') }}">Home</a>
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
                            <h3>Customer Lists</h3>

                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Customer's Name</th>
                                    <th>Product Name</th>
                                    <th>Payment Method</th>
                                    <th>Order Number</th>
                                    <th>Shipment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>

                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="For Delivery">For Delivery</option>
                                            <option value="Received">Received</option>
                                            <option value="Return to Seller">Return to Seller</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="For Delivery">For Delivery</option>
                                            <option value="Received">Received</option>
                                            <option value="Return to Seller">Return to Seller</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="For Delivery">For Delivery</option>
                                            <option value="Received">Received</option>
                                            <option value="Return to Seller">Return to Seller</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"><br>Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="PisoWifi">Cash on Delivery</option>
                                            <option value="E-Loading">OnHand Delivery</option>
                                            <option value="Gadgets">Shoppee Payment</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            <!-- MAIN -->
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="{{ URL::asset('js/customer.js') }}"></script>
    </body>

    </html>
