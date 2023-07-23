@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="{{ asset('css/status.css') }}" rel="stylesheet">
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
            <li class="active">
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
                    <h1>Product Status</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Product Status</a>
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
                        <h3>Product Status</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Ordered Date</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>Mary Grace Elias</p>
                                </td>
                                <td>4</td>
                                <td>Piso Wifi</td>
                                <td>01-10-2021</td>
                                <td>
                                    <label class="custom-select">
                                        <select name='options' id="select">
                                            <option value="0" id="">Select Status</option>
                                            <option value="1" id="1">Ok</option>
                                            <option value="2" id="2">For Testing</option>
                                            <option value="3" id="3">With Damage</option>
                                        </select>
                                    </label>
                                <td>
                            </tr>
                            <tr>
                                <td>

                                    <p>Mary Joy Reambonanza</p>
                                </td>
                                <td>1</td>
                                <td>E-Loading Machine</td>
                                <td>01-10-2021</td>

                                <td><label class="custom-select">
                                        <select name='options' id="select">
                                            <option value="0" id="">Select Status</option>
                                            <option value="1" id="1">Ok</option>
                                            <option value="2" id="2">For Testing</option>
                                            <option value="3" id="3">With Damage</option>
                                        </select>
                                    </label></td>
                            </tr>
                            <tr>
                                <td>

                                    <p>John Doe</p>
                                </td>
                                <td>5</td>
                                <td>Piso Wifi</td>
                                <td>01-10-2021</td>
                                <td><label class="custom-select">
                                        <select name='options' id="select">
                                            <option value="0" id="">Select Status</option>
                                            <option value="1" id="1">Ok</option>
                                            <option value="2" id="2">For Testing</option>
                                            <option value="3" id="3">With Damage</option>
                                        </select>
                                    </label></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Rogina Rolloque</p>
                                </td>
                                <td>2</td>
                                <td>Cellphone</td>
                                <td>01-10-2021</td>
                                <td><label class="custom-select">
                                        <select name='options' id="select">
                                            <option value="0" id="">Select Status</option>
                                            <option value="1" id="1">Ok</option>
                                            <option value="2" id="2">For Testing</option>
                                            <option value="3" id="3">With Damage</option>
                                        </select>
                                    </label></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Seth Obenita</p>
                                </td>
                                <td>8</td>
                                <td>E-Loading Parts</td>
                                <td>01-10-2021</td>
                                <td><label class="custom-select">
                                        <select name='options' id="select">
                                            <option value="0" id="">Select Status</option>
                                            <option value="1" id="1">Ok</option>
                                            <option value="2" id="2">For Testing</option>
                                            <option value="3" id="3">With Damage</option>
                                        </select>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn">
                <button type="button" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- CONTENT -->
    <script src="{{ asset('js/status.js') }}"></script>
</body>

</html>
@endsection