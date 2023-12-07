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
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/pisowifipartsAccessories.css') }}" rel="stylesheet">
        <title>PisoWifi-Parts-Accessories</title>
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
                        <h1>Product - Piso WiFi Parts & Accessories</h1>

                    </div>
                    <form action="{{ route('PisoWifi_parts_accessories.data.export') }}" method="POST" target="_blank">
                        @csrf

                        <button type="submit" class="btn-download" style="width:150px;">
                            <i class='bx bxs-cloud-download'></i>
                            <span class="text" style="font-size: 10px">Download Excel</span>
                        </button>

                    </form>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            @if (auth()->user()->type === 'admin')
                                <div style="width: 100%; text-align: right">
                                    <div class="table-buttons">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                            style="width: 120px; height:50px, border-radius:5px; border: 1px solid #9ACEA2;">
                                            <i class='bx bx-plus' style="font-size:15px; color:rgb(102, 102, 102);">Add
                                                Product</i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#report"
                                            style="width: 120px; height:50px, border-radius:5px; border: 1px solid #9ACEA2;">
                                            <i class='bx bx-plus' style="font-size:15px; color:rgb(102, 102, 102);">Create
                                                Report</i>
                                        </button>
                                    </div>
                                </div>
                            @endif


                            <!--Add Product Modal-->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
                                data-bs-backdrop="static">
                                <div class="modal-dialog" style="width: 50%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Items</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="button"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="{{ url('pisowifi-parts-accessories') }}" method="POST">
                                            @csrf

                                            <div class="modal-body">

                                                <div class="form-group mb-3">
                                                    <label>Item Name</label>
                                                    <input type="text" name="ItemsName" required class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Select Status</label>
                                                    <select name="Status" required class="form-control" disabled>
                                                        <option>Select Status</option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Pending" selected>Pending</option>
                                                        <option value="Decline">Decline</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Treshold Product</label>
                                                    <input type="number" name="StocksPurchased" required
                                                        class="form-control" value="10">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Stocks Purchased</label>
                                                    <input type="number" name="StocksPurchased" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Actual Stocks
                                                        Based on actual
                                                        checking(EDUD)</label>
                                                    <input type="number" name="ActualStocksBasedonactualcheckingEDUD"
                                                        required class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Damage or missing or
                                                        for Testing</label>
                                                    <input type="number" name="Damageormissingorfortesting" required
                                                        class="form-control">
                                                </div>


                                                <div class="form-group mb-3">
                                                    <label>Remaining Stocks</label>
                                                    <input type="number" name="RemainingStocks" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Upcoming Stocks</label>
                                                    <input type="number" name="UpcomingStocks" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Remarks
                                                    </label>
                                                    <input type="text" name="Remarks" required class="form-control">
                                                </div>

                                                <div class="modal-footer">
                                                    <div class="btn" style="display:flex; justify-content:flex-end;">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 110px; border-radius:8px; font-size:13px; height:45px; ">Add
                                                            Items</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            style="width: 110px; border-radius:8px; font-size:13px; height:45px;"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </form>

                                        @if (Session::has('message-Add'))
                                            <script>
                                                swal("message", "Successfuly Added Item", "success", {
                                                    button: "okay",
                                                    style: "justify-content:center;",
                                                });
                                            </script>
                                        @endif

                                    </div>

                                </div>

                            </div>


                            <div class="modal fade" id="report" data-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 50%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create Reports</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="" method="POST">
                                            @csrf

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>What Reports?</label>
                                                    <select name="Status" required class="form-control">
                                                        <option value="" disabled selected>Select
                                                        </option>
                                                        <option value="">Test Reports</option>
                                                        <option value="Ongoing">Inventory Report Summary</option>
                                                        <option value="Pending">Inventory and Condition of Products Report
                                                        </option>
                                                        <option value="Decline">Inventory Audit Report</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description:</label>
                                                    <textarea type="text" id="description" name="description" class="form-control"
                                                        placeholder="Enter report description" required></textarea>
                                                </div>
                                                <div class="modal-footer ">
                                                    <div class="btn"
                                                        style="display:flex; justify-content:flex-end; padding:5px;">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Create
                                                            Reports</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                            style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                        @if (Session::has('message-add'))
                                            <script>
                                                swal("message", "Successfuly Added Item", "success", {
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
                                    <th>Item Name</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Remaining Stocks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pisowifi_parts_accessories as $pisoWifi)
                                    <tr>
                                        <td style="border: none">
                                            {{ $pisoWifi->ItemsName }}
                                        </td>
                                        <td style="border: none">{{ $pisoWifi->Status }}</td>
                                        <td style="border: none">{{ $pisoWifi->Remarks }}</td>
                                        <td style="border: none">{{ $pisoWifi->RemainingStocks }}</td>

                                        @if (auth()->user()->type === 'admin')
                                            <td style="width: 30%; border: none">

                                                @if ($pisoWifi->treshold >= $pisoWifi->RemainingStocks)
                                                    <a style="width: 135px; padding: 10px; cursor:pointer;  @if ($pisoWifi->RemainingStocks == 0) pointer-events: none; opacity: 0.5; @endif"
                                                        onclick="confirmSendEmail()"><i class='bx bxs-cart'></i> Purchase
                                                        Item</a>
                                                @else
                                                    <a style="width: 135px; padding: 10px; cursor:pointer; 
                                            @if ($pisoWifi->RemainingStocks == 0) pointer-events: none; opacity: 0.5; @endif"
                                                        data-toggle="modal"
                                                        data-target="#orderModal{{ $pisoWifi->id }}"><i
                                                            class='bx bxs-cart'></i> Purchase Item</a>
                                                @endif
                                                <a style="color: #b5a55d; padding: 10px; cursor:pointer;" href="#"
                                                    data-toggle="modal" data-target="#productModal{{ $pisoWifi->id }}"><i
                                                        class='bx bxs-show'></i> View</a>
                                                <a style="color: #4CA7DF; padding: 10px ; cursor: pointer;" href="#"
                                                    data-toggle="modal"
                                                    data-target="#productModalEdit{{ $pisoWifi->id }}"><i
                                                        class='bx bxs-pencil'></i> Edit</a>
                                                <a style="color: #FF6767; padding: 10px; cursor: pointer;" href="#"
                                                    data-toggle="modal" data-target="#deleteModal{{ $pisoWifi->id }}"><i
                                                        class='bx bxs-trash'></i> Delete </a>
                                            </td>
                                        @else
                                            <td style="width: 30%; border: none">
                                                <a style="color: #b5a55d; padding: 10px; cursor:pointer;" href="#"
                                                    data-toggle="modal" data-target="#productModal{{ $pisoWifi->id }}"><i
                                                        class='bx bxs-show'></i> View</a>
                                            </td>
                                        @endif
                                    </tr>

                                    <!-- View Modal -->
                                    <div class="modal fade" id="productModal{{ $pisoWifi->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="productModalLabel{{ $pisoWifi->id }}"
                                        aria-hidden="true" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel{{ $pisoWifi->id }}">
                                                        {{ $pisoWifi->ItemsName }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Status:</label>
                                                        <input class="form-control" type="text"
                                                            value="{{ $pisoWifi->Status }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Stocks Purchased: </label>
                                                        <input class="form-control" type="text"
                                                            value="{{ $pisoWifi->StocksPurchased }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Actual Stocks Based on Actual Checking:</label>
                                                        <input class="form-control" type="text"
                                                            value="{{ $pisoWifi->ActualStocksBasedonactualcheckingEDUD }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Damage or Missing or Foresting:</label>
                                                        <input class="form-control" type="text"
                                                            value="{{ $pisoWifi->Damageormissingorfortesting }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Remaining Stocks:</label>
                                                        <input class="form-control" type="text"
                                                            value="{{ $pisoWifi->RemainingStocks }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upcoming Stocks:</label>
                                                        <input class="form-control" type="text"
                                                            value="{{ $pisoWifi->UpcomingStocks }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Remarks:</label>
                                                        <input class="form-control" type="text"
                                                            value="{{ $pisoWifi->Remarks }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order Modal -->
                                    <div class="modal fade" id="orderModal{{ $pisoWifi->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="orderModalLabel{{ $pisoWifi->id }}"
                                        aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Purchase Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="/orders" method="POST">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="customer_id">Customer
                                                                <a href="#addCustomerModal" data-toggle="modal"
                                                                    data-dismiss="modal"
                                                                    style="color: #4CA7DF; padding: 10px;">
                                                                    <i class='bx bx-plus'></i> Add Customer</a>
                                                            </label>
                                                            <select name="customer_id" id="customer_id"
                                                                class="form-control" required>
                                                                <option>Select Customer</option>
                                                                @foreach ($customers as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="item_name">Item Name</label>
                                                            <input type="text" name="item_name"
                                                                id="orderModalLabel{{ $pisoWifi->id }}"
                                                                class="form-control" value="{{ $pisoWifi->ItemsName }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="product_type" hidden></label>
                                                            <input type="text" name="product_type"
                                                                value="pisowifi_parts" hidden>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="product_id" hidden></label>
                                                            <input type="text" name="product_id"
                                                                value="{{ $pisoWifi->id }}" hidden>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="quantity_sold">Quantity</label>
                                                            <input type="number" name="quantity_sold" id="quantity_sold"
                                                                class="form-control" required>
                                                        </div>

                                                        <div>
                                                            <input type="number" name="product_id"
                                                                value="{{ $pisoWifi->id }}" hidden>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="category" hidden>Category</label>
                                                            <input type="text" name="category" id="category"
                                                                value="Pisowifi-Parts-Accessories" class="form-control"
                                                                hidden>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="payment_method">Payment Method</label>
                                                            <select name="payment_method" id="payment_method"
                                                                class="form-control" required>
                                                                <option value="" disabled selected>Select Payment
                                                                    Method</option>
                                                                <option value="Credit Card">Credit Card</option>
                                                                <option value="G-cash">G-cash</option>
                                                                <option value="Other Online Banks">Other Online Banks
                                                                </option>
                                                                <option value="Cash on Delivery">Cash on Delivery</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="shipment_status">Shipment Status</label>
                                                            <select name="shipment_status" id="shipment_status"
                                                                class="form-control" required disabled>
                                                                <option disabled selected>Select Shipment
                                                                </option>
                                                                <option value="Pending" selected>Pending</option>
                                                                <option value="Shipped">Shipped</option>
                                                                <option value="Delivered">Delivered</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer ">
                                                            <div class="btn"
                                                                style="display:flex; justify-content:flex-end; padding:5px;">
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Purchase
                                                                </button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal"
                                                                    style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Close</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add Customer Modal -->
                                    <div id="addCustomerModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Customer</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('Customers.store') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Age</label>
                                                            <input type="number" class="form-control" id="age"
                                                                name="age" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"
                                                                style="width: 120px; border-radius:9px; font-size:15px">Add
                                                                Customer</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal"
                                                                style="width: 120px; border-radius:9px; font-size:15px">Cancel</button>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                    <!--Edit Item Modal-->
                                    <div class="modal fade" id="productModalEdit{{ $pisoWifi->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="productModalLabel{{ $pisoWifi->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel{{ $pisoWifi->id }}">
                                                        {{ $pisoWifi->ItemsName }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('pisowifi-parts-accessories.update', $pisoWifi->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-body">
                                                            <div class="form-group mb-3">
                                                                <label>Item Name</label>
                                                                <input type="text" name="ItemsName" required
                                                                    value="{{ $pisoWifi->ItemsName }}"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Select Status</label>
                                                                <select name="Status" required class="form-control">
                                                                    <option disabled>Select Status</option>
                                                                    <option value="Ongoing"
                                                                        {{ $pisoWifi->Status === 'Ongoing' ? 'selected' : '' }}>
                                                                        Ongoing</option>
                                                                    <option value="Pending"
                                                                        {{ $pisoWifi->Status === 'Pending' ? 'selected' : '' }}>
                                                                        Pending</option>
                                                                    <option value="Decline"
                                                                        {{ $pisoWifi->Status === 'Decline' ? 'selected' : '' }}>
                                                                        Decline</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label>Treshold Product</label>
                                                                <input type="number" name="StocksPurchased" required
                                                                    class="form-control"
                                                                    value="{{ $pisoWifi->treshold }}">
                                                            </div>

                                                            <p>Stocks Purchased:</p>
                                                            <input class="form-control" type="number"
                                                                name="StocksPurchased"
                                                                value="{{ $pisoWifi->StocksPurchased }}">

                                                            <p>Actual Stocks Based on Actual Checking:</p>
                                                            <input class="form-control" type="number"
                                                                name="ActualStocksBasedonactualcheckingEDUD"
                                                                value="{{ $pisoWifi->ActualStocksBasedonactualcheckingEDUD }}">

                                                            <p>Damage or Missing or Foresting:</p>
                                                            <input class="form-control" type="number"
                                                                name="Damageormissingorfortesting"
                                                                value="{{ $pisoWifi->Damageormissingorfortesting }}">

                                                            <p>Remaining Stocks:</p>
                                                            <input class="form-control" type="number"
                                                                name="RemainingStocks"
                                                                value="{{ $pisoWifi->RemainingStocks }}">

                                                            <p>Upcoming Stocks:</p>
                                                            <input class="form-control" type="number"
                                                                name="UpcomingStocks"
                                                                value="{{ $pisoWifi->UpcomingStocks }}">

                                                            <p>Remarks:</p>
                                                            <input class="form-control" type="text" name="Remarks"
                                                                value="{{ $pisoWifi->Remarks }}">
                                                        </div>

                                                        {{-- <div class="modal-footer">
                                                            <div class="btn">
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    Changes</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div> --}}

                                                        <div class="modal-footer ">
                                                            <div class="btn"
                                                                style="display:flex; justify-content:flex-end; padding:5px;">
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Save
                                                                    Changes</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal"
                                                                    style="width: 110px; height:45px; border-radius:8px; font-size:13px;">Close</button>
                                                            </div>

                                                        </div>
                                                    </form>

                                                    @if (Session::has('message-edit'))
                                                        <script>
                                                            swal("message", "Successfuly Edit Item", "success", {
                                                                button: "okay",
                                                                style: "justify-content:center;",
                                                            });
                                                        </script>
                                                    @endif





                                                </div>

                                            </div>
                                        </div>
                                        @if (Session::has('message-Customer'))
                                            <script>
                                                swal("message", "Successfully Added Customer", "success", {
                                                    button: "okay",
                                                    style: "justify-content:center;",
                                                });
                                            </script>
                                        @endif
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $pisoWifi->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel{{ $pisoWifi->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $pisoWifi->id }}">
                                                        Confirm
                                                        Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this item?
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{ route('pisowifi-parts-accessories.delete', $pisoWifi->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            style="width: 90px">Delete</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            style="width: 90px" data-dismiss="modal">Cancel</button>
                                                    </form>




                                                </div>
                                            </div>
                                        </div>
                                        @if (Session::has('message-delete'))
                                            <script>
                                                swal("message", "Successfully Item Deleted", "success", {
                                                    button: "okay",
                                                    style: "justify-content:center;",
                                                });
                                            </script>
                                        @endif

                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $pisowifi_parts_accessories->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </main>
            <!-- MAIN -->
        </section>

        
        <script>
            function confirmSendEmail() {
                console.log('Send email');
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/pisowifi.js') }}"></script>
    </body>

    </html>
