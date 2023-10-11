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
                        <h1>Customer Lists</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Customer Lists</a>
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
                        <table>
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Customer's Name</th>
                                    <th>Product Name</th>
                                    <th>Payment Method</th>
                                    <th>Order Number</th>
                                    <th>Shipment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>

                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="For Delivery">For Delivery</option>
                                            <option value="Received">Received</option>
                                            <option value="Return to Seller">Return to Seller</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="For Delivery">For Delivery</option>
                                            <option value="Received">Received</option>
                                            <option value="Return to Seller">Return to Seller</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="For Delivery">For Delivery</option>
                                            <option value="Received">Received</option>
                                            <option value="Return to Seller">Return to Seller</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"><br>Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method"> Select Payment Method</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="OnHand Delivery">OnHand Delivery</option>
                                            <option value="Shoppee Payment">Shoppee Payment</option>
                                        </select>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <select class="form-control, col-8">
                                            <option value=" Select Payment Method">Select Shipment Status</option>
                                            <option value="PisoWifi">Cash on Delivery</option>
                                            <option value="E-Loading">OnHand Delivery</option>
                                            <option value="Gadgets">Shoppee Payment</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
