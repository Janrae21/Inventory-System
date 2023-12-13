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
    <link href="{{ asset('css/view-profile.css') }}" rel="stylesheet">
    <title>View Profile</title>
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
                    <h1>View Profile</h1>
                    <ul class="breadcrumb">
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="{{ asset('/admin/home') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <br>

                                    <h1>
                                        <center>
                                            Personal Information
                                        </center>
                                    </h1>

                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="personal_info">
                                            <form class="form-horizontal" method="POST"
                                                action="{{ route('update-profile') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label"
                                                        required>Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName"
                                                            placeholder="Name" value="{{ Auth::user()->name }}"
                                                            name="name">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label"
                                                        required>Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail"
                                                            placeholder="Email" value="{{ Auth::user()->email }}"
                                                            name="email">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" required>New
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="newpassword"
                                                            placeholder="Enter new password" name="newpassword">
                                                        <span class="text-danger error-text newpassword_error"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" required>Confirm New
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="cnewpassword"
                                                            placeholder="Re-Enter new password"
                                                            name="newpassword_confirmation">
                                                        <span class="text-danger error-text cnewpassword_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 150px; height:45px; border-radius:8px; font-size:13px; margin-top:20px;">Save
                                                            Changes</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </section>
        </main>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- CONTENT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/view-profile.js') }}"></script>
</body>

</html>
