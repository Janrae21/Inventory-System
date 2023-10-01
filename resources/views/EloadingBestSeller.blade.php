@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/EloadingBestSeller.css') }}" rel="stylesheet">

        <title>Eloading-Best-Seller</title>
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
                    <a href="{{ url('#') }}">
                        <i class='bx bxs-cart'></i>
                        <span class="text">Product</span>
                    </a>
                <li class="drop-item">
                    <a href="{{ url('/pisowifi-parts-accessories') }}">
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
                <li class="active">
                    <a href="{{ url('/eloading-best-seller') }}">
                        <!-- <i class='bx bxs-cart'></i> -->
                        <span class="text">Eloading Best Seller</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('physical-store-computer-stocks-monitoring') }}">
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

            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Eloading Best Sellers</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="{{ asset('/admin/home') }}">Home</a>
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


                            <h3>Eloading Best Sellers</h3>
                            <!-- Button trigger modal -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                style="width:150px; height:50px, border-radius:5px; background-color: green; border-style:none">
                                <i class='bx bx-plus-circle' style="font-size:24px; color:white;">Add</i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Items</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="{{ url('eloading-best-seller') }}" method="POST">
                                            @csrf

                                            <div class="modal-body">

                                                <div class="form-group mb-3">
                                                    <label for="">Item</label>
                                                    <input type="text" name="Item" required class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="">Quantity</label>
                                                    <input type="text" name="Quantity" required class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <select name="Category" required class="form-control">
                                                        <option value="">---Category---</option>
                                                        <option value="PisoWifi">PisoWifi</option>
                                                        <option value="E-Loading">E-Loading</option>
                                                        <option value="Gadgets">Gadgets</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="">Date</label>
                                                    <input type="date" name="Date" required class="form-control">
                                                </div>

                                                <div class="modal-footer ">
                                                    <div class="btn">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Changes</button>
                                                        <button type="submit" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </form>

                                        @if (Session::has('message'))
                                            <script>
                                                swal("message", "Successfuly Added Item", "success", {
                                                    button: "okay",
                                                });
                                            </script>
                                        @endif

                                    </div>

                                </div>

                            </div>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                style="width:150px; border-radius:5px; background-color: #cc5500; border-style:none">
                                <i class='bx bxs-edit-alt' style="font-size:20px; color:white;">Edit</i>
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Item</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="" method="">
                                            @csrf

                                            <div class="modal-body">

                                                <div class="form-group mb-3">
                                                    <label>Search Item</label>
                                                    <input type="search" name="search" value="" id="search" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="">Item</label>
                                                    <input type="text" name="Item" value="" required class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="">Quantity</label>
                                                    <input type="text" name="Quantity" value="" required class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <select name="Category" required class="form-control">
                                                        <option value="">---Category---</option>
                                                        <option value="PisoWifi">PisoWifi</option>
                                                        <option value="E-Loading">E-Loading</option>
                                                        <option value="Gadgets">Gadgets</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="">Date</label>
                                                    <input type="date" name="Date" value="" required class="form-control">
                                                </div>

                                                <div class="modal-footer ">
                                                    <div class="btn">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Changes</button>
                                                        <button type="submit" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>ITEMS</th>
                                    <th>QUANTITY</th>
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($_eloading_best_seller as $cd)
                                    <tr>
                                        <td>
                                            <p>{{ $cd->Item }}</p>
                                        <td>{{ $cd->Quantity }}</td>
                                        <td>{{ $cd->Date }}</td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $_eloading_best_seller->links('pagination::bootstrap-5') }}
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
        <script src="{{ asset('js/seller.js') }}"></script>

    </body>

    </html>
