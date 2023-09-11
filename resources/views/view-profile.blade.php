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
        <link href="{{ asset('css/view-profile.css') }}" rel="stylesheet">

        <title>View Profile</title>
    </head>

    <body>
        <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="#" class="brand">
                <img src="{{ asset('images/logo.png') }}">
            </a>
            <ul class="side-menu top">
                <li class="active">
                    <a href="{{ asset('/admin/home') }}">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">View Profile</span>
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
                    <!-- Empty -->
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
                        <h1>View Profile</h1>
                        <ul class="breadcrumb">
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="{{ asset('/admin/home') }}">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="box-info">

                </ul>
                <ul class="box-info">
                    <div class="container">
                        <div class="profile">
                            <img src="https://o.remove.bg/downloads/85a94bf2-d4b1-43a7-85cb-490c7ff88316/user-removebg-preview.png"
                                alt="Profile Picture">
                            <h1 id="name">Janrae Fagaragan</h1>
                            <h3 id="job-title">USERNAME</h3>

                            <ul>
                                <li><strong>Email:</strong> <span id="email">janrae.fagaragan@flarego.com</span></li>
                                <li><strong>Cellphone Number:</strong> <span id="phone">09887654345</span></li>
                                <li><strong>Change Password:</strong> <span id="phone">faggy</span></li>
                                <li><strong>Location:</strong> <span id="location">New York, USA</span></li>
                            </ul>
                            <button id="editButton" onclick="toggleEditMode()">Edit</button>
                        </div>
                    </div>
                </ul>

                <div class="table-data">

                </div>

            </main>
            <!-- MAIN -->
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="http://127.0.0.1:8000/js/view-profile.js"></script>
    </body>

    </html>
