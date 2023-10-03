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
                    <h1>Product</h1>
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
