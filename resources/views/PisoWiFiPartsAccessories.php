@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="{{ asset('css/pisowifipartsAccessories.css') }}" rel="stylesheet">

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
                <a href="{{ url('/packaging-monitoring') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Packaging Monitoring</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('/EloadingBestSeller') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Eloading Best Seller</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('/Parts-of-eloading') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Parts Of Eloading</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('physical-store-computer-stocks-monitoring') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Physical Store Computer Stocks Monitoring</span>
                </a>
            </li>
            <li class="drop-item">
                <a href="{{ url('/pisowifi-parts-accessories') }}">
                    <!-- <i class='bx bxs-cart'></i> -->
                    <span class="text">Piso WiFi Parts and Accessories</span>
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
                    <h1>Piso WiFi Parts & Accessories</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Piso WiFi Parts & Accessories</a>
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
                        <h3>Piso WiFi Parts & Accessories</h3>
                        <i class='bx bx-plus-circle' style="font-size:24px; color:green;">Add</i>
                        <i class='bx bx-minus-circle' style="font-size:24px; color:red;">Remove</i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ITEMS Name</th>
                                <th>STATUS</th>
                                <th>Remaining Stocks</th>
                                <th>Item Sold As Of</th>
                                <th>Stocks Purchased</th>
                                <th>Actual Stocks<br>Based on actual</br><br>checking(EDUD)</br></th>
                                <th>Damage or missing or <br>for Testing</br></th>
                                <th>Upcoming Stocks</th>
                                <th>Remarks Updated <br>As Of</br></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>

                                    <p>Custom Board for Piso Wifi</p>
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

                                    <p>Custom Board for Piso Wifi with Bill Acceptor</p>
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

                                    <p>Custom Board for Piso Wifi (Power cut)</p>
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

                                    <p>Orange Pi One H3 quadcore 512MB</p>
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

                                    <p>Raspberry Pi 3 Model B+</p>
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

                                    <p>Raspberry Pi Model B</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>UTP Cable - CAT6</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>USB to LAN (USB 3.0 to Gb Switch)</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Tp-Link Eap110</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Comfast CF-EW71 300 mbps,coverege: 100 meters</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Comfast CF-EW73 300 mbps</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>32GB Sandisk SD Card/ Memory Card</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>SD Card 16GB Strontium</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Wireless Sub Vendo</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>ESP8266 NodeMCU LUA CP2102 ESP-12E</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Wired Sub Vendo</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>ETHERNET FOR WIRED SUB-VENDO</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Arduino (NANO) w/ cords - for wired sub-vendo</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Arduino Uno w/ cords</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
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
                            </tr>
                            <tr>
                                <td>

                                    <p>Switch hub TP-Link 8 Ports</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Switch hub TP-Link 5 Ports</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Switch hub TP-Link 5 Ports GIGABITS</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>LAN CABLE</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>RJ 45</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>FLASH DRIVE</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Ugreen card reader</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Channel Relay</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
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
                            </tr>
                            <tr>
                                <td>

                                    <p>Dupont wires</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Tv Box rk32289</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Tv Box rk3228A</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Wifi Vendo Box small</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Wifi Vendo Machine</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
                                <td>40</td>
                                <td>40</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Parabollic</p>
                                </td>
                                <td>40</td>
                                <td>40</td>
                                <td>2</td>
                                <td>50</td>
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
    <script src="{{ asset('js/pisowifi.js') }}"></script>

</body>

</html>