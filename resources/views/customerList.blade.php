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
        @component('components.SidebarComponent')
        @endcomponent
        <!-- SIDEBAR -->



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
                        <h1>Customers</h1>
                    </div>
                    <form action="{{ route('Customers.export') }}" method="POST" target="_blank">
                        @csrf

                        <button type="submit" class="btn-download" style="width:150px;">
                            <i class='bx bxs-cloud-download'></i>
                            <span class="text" style="font-size: 10px">Download Excel</span>
                        </button>

                    </form>
                </div>

                <div style="width: 100%">
                    <div class="table-buttons" style="float: right; margin-bottom: 10px">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            class="show-when-mobile"
                            style="width: 120px; height:40px; border-radius: 5px; border: 1px solid #9ACEA2;">
                            <i class='bx bx-plus' style="font-size:15px; color:rgb(102, 102, 102);">Add Customer</i>
                        </button>
                    </div>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">

                            <div style="width: 100%; text-align: right">
                                <div class="table-buttons">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        class="show-when-web"
                                        style="width: 120px; height:40px; border-radius: 5px; border: 1px solid #9ACEA2;">
                                        <i class='bx bx-plus' style="font-size:15px; color:rgb(102, 102, 102);">Add
                                            Customer</i>
                                    </button>
                                </div>
                            </div>


                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
                                data-bs-backdrop="static">
                                <div class="modal-dialog" style="width: 95%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Customers</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="{{ route('Customers.store') }}" method="POST">
                                            @csrf

                                            <div class="modal-body">


                                                <div class="form-group mb-3">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" id="name" required
                                                        name="name" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Age</label>
                                                    <input type="number" class="form-control" id="age" name="age"
                                                        required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        required>
                                                </div>

                                                <div class="modal-footer ">
                                                    <div class="btn"
                                                        style="display:flex; justify-content:flex-end; padding:5px;">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Add
                                                            Customer</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                            style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Close</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </form>

                                        @if (Session::has('message-Customer'))
                                            <script class="swal-button">
                                                swal("message", "Successfuly Added Customers", "success", {
                                                    button: "okay",
                                                    style: "justify-content:center;",
                                                });
                                            </script>
                                        @endif

                                    </div>

                                </div>

                            </div>


                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th style="border: none; border-bottom: 1px solid rgba(220, 220, 220, 0.5)">Name</th>
                                    <th style="border: none; border-bottom: 1px solid rgba(220, 220, 220, 0.5)">Email</th>
                                    <th style="border: none; border-bottom: 1px solid rgba(220, 220, 220, 0.5)">Address
                                    </th>
                                    <th style="border: none; border-bottom: 1px solid rgba(220, 220, 220, 0.5)">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $od)
                                    <tr>
                                        <td>{{ $od->name }}</td>
                                        <td>{{ $od->email }}</td>
                                        <td>{{ $od->address }}</td>
                                        <td>

                                            <a style="color: #4CA7DF; padding: 10px; cursor: pointer;" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $od->id }}">
                                                <i class='bx bxs-pencil'></i> Edit
                                            </a>

                                            <a style="color: #FF6767; padding: 10px; cursor: pointer;"
                                                onclick="deleteUser({{ $od->id }})" data-toggle="modal"
                                                data-target="#deleteModal{{ $od->id }}"><i
                                                    class='bx bxs-trash'></i>
                                                Delete </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $od->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="CustomersModalEditLabel"
                                        aria-hidden="true">

                                        <!-- Edit Modal content -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModal">Edit Customer
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form action="{{ route('Customers.update', $od->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body">
                                                        <div class="form-group mb-3">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                value="{{ $od->name }}" name="name" required>

                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="{{ $od->email }}" required>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Address</label>
                                                            <input type="address" class="form-control" id="address"
                                                                name="address" value="{{ $od->address }}" required>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button
                                                            style="width: 110px; height:45px; border-radius:8px; font-size:13px"
                                                            type="submit" class="btn btn-primary">Update
                                                            Customer</button>
                                                        <button
                                                            style="width: 110px; height:45px; border-radius:8px; font-size:13px;"
                                                            type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
















                                    


                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $customers->links('pagination::bootstrap-5') }}
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
