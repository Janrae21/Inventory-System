@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/status.css') }}" rel="stylesheet">
        <title>Product-Status</title>
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
                        <h1>Product Status</h1>
                    </div>
                    <form action="{{ route('status.export') }}" method="POST" target="_blank">
                        @csrf

                        <button type="submit" class="btn-download" style="width:150px;">
                            <i class='bx bxs-cloud-download'></i>
                            <span class="text" style="font-size: 10px">Download Excel</span>
                        </button>

                    </form>
                </div>

                <div class="table-data">
                    <div class="order">

                        <table>
                            <thead>
                                <tr>
                                    <th> Purchased By </th>
                                    <th>Total Quantity</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productStatus as $item)
                                    <tr>
                                        <td> {{ !is_null($item->customer) ? $item->customer->name : '' }} </td>
                                        <td>
                                            <p>{{ $item->total_purchased }}</p>
                                        </td>
                                        <td> {{ date('F d Y', strtotime($item->purchase_date)) }} </td>
                                        <td>
                                            <button style="color: #b5a55d; padding: 10px; cursor:pointer;"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $item->id }}" onclick="selectItem({{ $item }})"><i
                                                    class='bx bxs-show'></i> View</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog" style="width: 100%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">View Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="selectItem('')"
                                                        aria-label="Close"></button>
                                                </div>


                                                <div class="modal-body">


                                                    <div class="form-group mb-3">
                                                        <label>Customer Name</label>
                                                        <input type="text" class="form-control" value="{{ $item->customer->name }}" disabled required>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" value="{{ $item->purchase_date }}" disabled required>
                                                    </div>

                                                    <div class="form-group mb-3" id="product-details">
                                                        <label>Products</label>

                                                        <div class="grid-container">
                                                            @foreach (json_decode($item->item_names, true) as $value)
                                                                <ul class="grid-item">
                                                                    <li> <b> {{ $value }} </b> </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>

                                                        <div class="grid-container">
                                                            @foreach (json_decode($item->quantity, true) as $value)
                                                                <ul class="grid-item">
                                                                    <li>{{ $value }}</li>
                                                                </ul>
                                                            @endforeach
                                                        </div>

                                                        <div class="grid-container">
                                                            @foreach (json_decode($item->status, true) as $value)
                                                                <ul class="grid-item">
                                                                    <li>{{ $value }}</li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

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
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{-- {{ $productStatus->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
            </main>

            <!-- MAIN -->
        </section>

        <script>
            const selectItem = (selected) => {
                console.log(selected);
            }

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/status.js') }}"></script>


    </body>

    </html>


{{-- CUSTOMER NAME
CATEGORY--------QUANTITY
Product name (1) __________5
Product name (2)________5
Date
STATUS --}}