@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/EloadingBestSeller.css') }}" rel="stylesheet">

        <title>Parts of Eloading</title>
    </head>

    <body>
        <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="#" class="brand">
                <img src="{{ asset('images/logo.png') }}">
            </a>
            <ul class="side-menu top">
                <li class="">
                    <a href="{{ asset('/admin/home') }}">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="dropdown-btn">
                    <a href="#">
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
                    <li class="active">
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

            <main>
                <div class="head-title">
                    <div class="left">
                        {{-- <h1>Parts of Eloading</h1> --}}
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Parts of Eloading</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="{{ asset('/admin/home') }}">>>Home</a>
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
                            <h3>Parts of Eloading</h3>

                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class='bx bx-minus-circle' style="font-size:20px; color:red;">Remove</i>
                            </button>
                            {{-- END Modal --}}
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class='bx bx-minus-circle' style="font-size:20px; color:red;">Edit</i>
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class='bx bx-minus-circle' style="font-size:20px; color:red;">Remove</i>
                            </button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>ITEMS Name</th>
                                    <th>STATUS</th>
                                    <th>Remaining Stocks</th>
                                    <th>Item Sold As Of</th>
                                    <th>Stocks Purchased</th>
                                    <th>Actual Stocks<br>Based on actual</br>checking(EDUD)</br></th>
                                    <th>Damage or missing or <br>for Testing</br></th>
                                    <th>Upcoming Stocks</th>
                                    <th>Remarks Updated <br>As Of</br></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <p>Eloading Custom board (ECB)</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Eloading Customboard (Non Android)</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>ESP 32</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Globe Simcard</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>TNT Sim card</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Cellphone</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>LCD Module (ST7920)</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Keypad Module</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>GSM Module</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>TP 70</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>TB 74</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>12VDC 3A Boontech Power supply 240VAC Adaptor</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>12V 5A AC/ DC Power Supply Adapter/LCD Power Adapter</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Switching Power supply 12V.3A</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Heavy Duty Coinslot</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Anti-Hooking Coinslot</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Eloading keypad coinslot only</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Eloading keypad coinslot and bill acceptor</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Eloading Android coinslot only</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Eloading Android coinslot and bill acceptor</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Power Surge</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>FT Timer</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Cord</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>DUPONT WIRES</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Buck Converter 12V to 5V</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Tablet PC Huawei</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>LED Frame for Coinslot</p>
                                    </td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td>40</td>
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
        <script src="http://127.0.0.1:8000/js/Eloadingparts.js"></script>
    </body>

    </html>
