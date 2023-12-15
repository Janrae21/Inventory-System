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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">
        <title>User Management</title>
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
                        <h1>Users</h1>
                    </div>
                </div>

                <div style="width: 100%">
                    <div class="table-buttons" style="float: right; margin-bottom: 10px">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            class="show-when-mobile"
                            style="width: 120px; height:40px; border-radius: 5px; border: 1px solid #9ACEA2;">
                            <i class='bx bx-plus' style="font-size:15px; color:rgb(102, 102, 102);">Add New User</i>
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
                                        <i class='bx bx-plus' style="font-size:15px; color:rgb(102, 102, 102);">Add New
                                            User</i>
                                    </button>
                                </div>
                            </div>


                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
                                data-bs-backdrop="static">
                                <div class="modal-dialog" style="width: 95%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="{{ route('user-management.store') }}" method="POST">
                                            @csrf

                                            <div class="modal-body">


                                                <div class="form-group mb-3">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" id="name" required
                                                        name="name" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Type</label>
                                                    <select name="type" id="type">
                                                        <option selected disabled>Select option</option>
                                                        <option value="0">User (Guest)</option>
                                                        <option value="1">Inventory Team</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" required>
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
                                            <script>
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
                                    <th style="border: none; border-bottom: 1px solid rgba(220, 220, 220, 0.5)">Types</th>
                                    <th style="border: none; border-bottom: 1px solid rgba(220, 220, 220, 0.5)">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $od)
                                    <tr>
                                        <td>{{ $od->name }}</td>
                                        <td>{{ $od->email }}</td>
                                        <td>{{$od->type}}</td>
                                        <td>

                                            <a style="color: #4CA7DF; padding: 10px; cursor: pointer;" href="#"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $od->id }}"><i
                                                    class='bx bxs-pencil'></i> Edit</a>


                                            <a style="color: #FF6767; padding: 10px; cursor: pointer;"
                                                onclick="deleteUser({{ $od->id }})" data-toggle="modal"
                                                data-target="#deleteModal{{ $od->id }}"><i class='bx bxs-trash'></i>
                                                Delete </a>
                                        </td>

                                    </tr>



                                    <div class="modal fade" id="editModal{{ $od->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form action="{{ route('user-management.update', $od->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body">
                                                        <div class="form-group mb-3">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $od->name }}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="{{ $od->email }}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Type</label>
                                                            <select name="type" id="type">
                                                                <option selected disabled>Select option</option>
                                                                <option value="0"
                                                                    {{ $od->type == 0 ? 'selected' : '' }}>User (Guest)
                                                                </option>
                                                                <option value="1"
                                                                    {{ $od->type == 1 ? 'selected' : '' }}>Inventory Team
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button style="width: 110px; height:45px; border-radius:8px; font-size:13px;" type="submit" class="btn btn-primary">Update
                                                                User</button>
                                                            <button style="width: 110px; height:45px; border-radius:8px; font-size:13px;" type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </main>



            <!-- MAIN -->
        </section>
        <script>
            function deleteUser(userId) {
                swal({
                        title: "Are you sure?",
                        text: "Once delete this user, you will not be able to recover this user!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            axios.delete('user-management/' + userId)
                                .then((result) => {
                                    swal("User deleted successfully", {
                                        icon: "success",
                                    });

                                    location.reload()
                                })
                        }
                    });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="{{ URL::asset('js/customer.js') }}"></script>
    </body>

    </html>
    {{-- @endsection --}}
