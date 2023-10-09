@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('css/Eloadingparts.css') }}" rel="stylesheet">
        <title>Parts of Eloading</title>
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

            <main>
                <div class="head-title">
                    <div class="left">
                    <h1>Product</h1>
                        {{-- <h1>Parts of Eloading</h1> --}}
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Parts of Eloading</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="{{ asset('/admin/home') }}">>>Home</a>
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
                            <h3>Parts of Eloading</h3>

                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                style="width:150px; height:50px, border-radius:5px; background-color: green; border-style:none">
                                <i class='bx bx-plus-circle' style="font-size:24px; color:white;">Add</i>
                            </button>

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

                                        <form action="{{ url('Parts-of-eloading') }}" method="POST">
                                            @csrf

                                            <div class="modal-body">

                                                <div class="form-group mb-3">
                                                    <label>ITEMS Name</label>
                                                    <input type="text" name="ItemsName" required class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <select name="Status" required class="form-control">
                                                        <option value="">---STATUS---</option>
                                                        <option value="Okay">Okay</option>
                                                        <option value="Error">Error</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Remaining Stocks</label>
                                                    <input type="text" name="RemainingStocks" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Item Sold As Of</label>
                                                    <input type="text" name="ItemSoldAsOf" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Stocks Purchased</label>
                                                    <input type="text" name="StocksPurchased" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Actual Stocks
                                                        Based on actual
                                                        checking(EDUD)</label>
                                                    <input type="text" name="ActualStocksBasedonactualcheckingEDUD"
                                                        required class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Damage or missing or
                                                        for Testing</label>
                                                    <input type="text" name="Damageormissingorforesting" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Upcoming Stocks</label>
                                                    <input type="text" name="UpcomingStocks" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Remarks Updated
                                                        As Of
                                                    </label>
                                                    <input type="text" name="RemarksUpdatedAsOf" required
                                                        class="form-control">
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

                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>ITEMS Name</th>
                                    <th>STATUS</th>
                                    <!-- <th>Remaining Stocks</th>
                                    <th>Item Sold As Of</th>
                                    <th>Stocks Purchased</th>
                                    <th>Actual Stocks<br>Based on actual</br>checking(EDUD)</br></th>
                                    <th>Damage or missing or <br>for Testing</br></th>
                                    <th>Upcoming Stocks</th> -->
                                    <th>Remarks Updated <br>As Of</br></th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($_parts_of_eloading as $pe)
                                    <tr>
                                        <td style="border:none;">
                                            {{ $pe->ItemsName }}
                                        </td>
                                        <td style="border:none;">{{ $pe->Status }}</td>
                                        <!-- <td>{{ $pe->RemainingStocks }}</td>
                                        <td>{{ $pe->ItemSoldAsOf }}</td>
                                        <td>{{ $pe->StocksPurchased }}</td>
                                        <td>{{ $pe->ActualStocksBasedonactualcheckingEDUD }}</td>
                                        <td>{{ $pe->Damageormissingorforesting }}</td>
                                        <td>{{ $pe->UpcomingStocks }}</td> -->
                                        <td style="border:none;">{{ $pe->RemarksUpdatedAsOf }}</td>
                                        <td style="width: 30%; border: none">
                                            <a style="width: 135px; padding: 10px; cursor:pointer;" data-toggle="modal"  data-target="#orderModal{{ $pe->id }}"><i class='bx bxs-cart'></i> Purchase Item</a>
                                            <a style="color: #b5a55d; padding: 10px; cursor:pointer;" href="#" data-toggle="modal" data-target="#productModal{{ $pe->id }}"><i class='bx bxs-show'></i> View</a>
                                            <a style="color: #4CA7DF; padding: 10px"><i class='bx bxs-pencil'></i> Edit</a>
                                            <a style="color: #FF6767; padding: 10px"><i class='bx bxs-trash'></i> Delete </a>
                                        </td>

                                    </tr>
                                    <!-- Order Modal -->
                                    <div  class="modal fade"  id="orderModal{{ $pe->id }}" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel{{ $pe->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Purchase Item</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('orders.store') }}" method="POST">
                                            @csrf
                                            
                                            <div class="form-group" >
                                                <label for="customer_id">Customer
                                                <a href="#addCustomerModal" data-toggle="modal" data-dismiss="modal" style="color: #4CA7DF; padding: 10px;">
                                                <i class='bx bx-plus'></i> Add Customer</a>
                                                </label>
                                                <select name="customer_id" id="customer_id" class="form-control">
                                                <option value="" disabled selected>Select Customer</option>
    
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">Item Name</label>
                                                <input type="text" name="item_name" id="orderModalLabel{{ $pe->id }}" class="form-control"  value="{{ $pe->ItemsName }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity_sold">Quantity</label>
                                                <input type="number" name="quantity_sold" id="quantity_sold" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <input type="text" name="category" id="category" value="Pisowifi" class="form-control" disabled>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="payment_method">Payment Method</label>
                                                <select name="payment_method" id="payment_method" class="form-control">
                                                <option value="" disabled selected>Select Payment Method</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="Credit Card">G-cash</option>
                                                <option value="Credit Card">Other Online Banks</option>
                                                <option value="Cash on Delivery">Cash on Delivery</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="shipment_status">Shipment Status</label>
                                                <select name="shipment_status" id="shipment_status" class="form-control">
                                                <option value="" disabled selected>Select Shipment Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Delivered">Delivered</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Purchase</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                
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
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="customer_name">Name</label>
                                                        <input type="text" class="form-control" id="customer_name" name="customer_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="customer_address">Address</label>
                                                        <input type="text" class="form-control" id="customer_address" name="customer_address">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="customer_age">Age</label>
                                                        <input type="number" class="form-control" id="customer_age" name="customer_age">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="customer_email">Email</label>
                                                        <input type="email" class="form-control" id="customer_email" name="customer_email">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">OK</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                     <!-- View Modal -->
                                     <div class="modal fade" id="productModal{{ $pe->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $pe->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel{{ $pe->id }}">{{ $pe->ItemsName }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Status:</p>
                                                    <input class="form-control" type="text" value="{{ $pe->Status }}" disabled>

                                                    <p>Stocks Purchased:</p>
                                                    <input class="form-control" type="text" value="{{ $pe->StocksPurchased }}" disabled>

                                                    <p>Actual Stocks Based on Actual Checking:</p>
                                                    <input class="form-control" type="text" value="{{ $pe->ActualStocksBasedonactualcheckingEDUD }}" disabled>

                                                    <p>Damage or Missing or Foresting:</p>
                                                    <input class="form-control" type="text" value="{{ $pe->Damageormissingorforesting }}" disabled>

                                                    <p>Remaining Stocks:</p>
                                                    <input class="form-control" type="text" value="{{ $pe->RemainingStocks }}" disabled>

                                                    <p>Upcoming Stocks:</p>
                                                    <input class="form-control" type="text" value="{{ $pe->UpcomingStocks }}" disabled>

                                                    <p>Remarks Updated As Of:</p>
                                                    <input class="form-control" type="text" value="{{ $pe->RemarksUpdatedAsOf }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>









































                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $_parts_of_eloading->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </main>

            <!-- MAIN -->
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/Eloadingparts.js') }}"></script>
    </body>

    </html>
