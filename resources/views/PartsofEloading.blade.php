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
        <title>Eloading Parts and Accessories</title>
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
                        <h1>Product- Eloading Parts and Accessories</h1>

                    </div>
                    <a href="#" class="btn-download">
                        <i class='bx bxs-cloud-download'></i>
                        <span class="text">Download Excel</span>
                    </a>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">

                            <!--Add Product Modal-->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                style="width:150px; height:50px, border-radius:5px; background-color: green; border-style:none">
                                <i class='bx bx-plus-circle' style="font-size:24px; color:white;">Add</i>
                            </button>

                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <label>Items Name</label>
                                                    <input type="text" name="ItemsName" required class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Select Status</label>
                                                    <select name="Status" required class="form-control">
                                                        <option>Select Status</option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Decline">Decline</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Remaining Stocks</label>
                                                    <input type="text" name="RemainingStocks" required
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
                                                    <input type="text" name="Damageormissingorfortesting" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Upcoming Stocks</label>
                                                    <input type="text" name="UpcomingStocks" required
                                                        class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Remarks
                                                    </label>
                                                    <input type="text" name="Remarks" required class="form-control">
                                                </div>

                                                <div class="modal-footer ">
                                                    <div class="btn">
                                                        <button type="submit" class="btn btn-primary">Add
                                                        </button>
                                                        <button type="submit" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </form>



                                    </div>

                                </div>

                            </div>
                            @if (Session::has('message'))
                                <script>
                                    swal("message", "Successfuly Added Item", "success", {
                                        button: "okay",
                                    });
                                </script>
                            @endif

                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Items Name</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
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
                                        <td style="border:none;">{{ $pe->Remarks }}</td>
                                        <td style="width: 30%; border: none">
                                            <a style="width: 135px; padding: 10px"><i class='bx bxs-cart'></i> Purchase
                                                Item</a>
                                            <a style="color: #b5a55d; padding: 10px; cursor:pointer;" href="#"
                                                data-toggle="modal" data-target="#productModal{{ $pe->id }}"><i
                                                    class='bx bxs-show'></i> View</a>
                                                    <a style="color: #4CA7DF; padding: 10px ; cursor: pointer;" href="#"
                                                    data-toggle="modal" data-target="#productModalEdit{{ $pe->id }}"><i
                                                        class='bx bxs-pencil'></i> Edit</a>
                                                <a style="color: #FF6767; padding: 10px; cursor: pointer;" href="#"
                                                    data-toggle="modal" data-target="#deleteModal{{ $pe->id }}"><i
                                                        class='bx bxs-trash'></i> Delete </a>
                                        </td>

                                    </tr>

                                    <!-- View Modal -->
                                    <div class="modal fade" id="productModal{{ $pe->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="productModalLabel{{ $pe->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel{{ $pe->id }}">
                                                        {{ $pe->ItemsName }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Status:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pe->Status }}" disabled>

                                                    <p>Stocks Purchased:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pe->StocksPurchased }}" disabled>

                                                    <p>Actual Stocks Based on Actual Checking:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pe->ActualStocksBasedonactualcheckingEDUD }}" disabled>

                                                    <p>Damage or Missing or Foresting:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pe->Damageormissingorfortesting }}" disabled>

                                                    <p>Remaining Stocks:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pe->RemainingStocks }}" disabled>

                                                    <p>Upcoming Stocks:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pe->UpcomingStocks }}" disabled>

                                                    <p>Remarks:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pe->Remarks }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--Edit Item Modal-->
                                    <div class="modal fade" id="productModalEdit{{ $pe->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="productModalLabel{{ $pe->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel{{ $pe->id }}">
                                                        {{ $pe->ItemsName }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('Parts-of-eloading.update', $pe->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')


                                                        <div class="modal-body">
                                                            <div class="form-group mb-3">
                                                                <label>Items Name</label>
                                                                <input type="text" name="ItemsName" required
                                                                    value="{{ $pe->ItemsName }}" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Select Status</label>
                                                                <select name="Status" required class="form-control">
                                                                    <option>Select Status</option>
                                                                    <option value="Ongoing"
                                                                        {{ $pe->Status === 'Ongoing' ? 'selected' : '' }}>
                                                                        Ongoing</option>
                                                                    <option value="Pending"
                                                                        {{ $pe->Status === 'Pending' ? 'selected' : '' }}>
                                                                        Pending</option>
                                                                    <option value="Decline"
                                                                        {{ $pe->Status === 'Decline' ? 'selected' : '' }}>
                                                                        Decline</option>
                                                                </select>
                                                            </div>

                                                            <p>Stocks Purchased:</p>
                                                            <input class="form-control" type="text"
                                                                name="StocksPurchased"
                                                                value="{{ $pe->StocksPurchased }}">

                                                            <p>Actual Stocks Based on Actual Checking:</p>
                                                            <input class="form-control" type="text"
                                                                name="ActualStocksBasedonactualcheckingEDUD"
                                                                value="{{ $pe->ActualStocksBasedonactualcheckingEDUD }}">

                                                            <p>Damage or Missing or Foresting:</p>
                                                            <input class="form-control" type="text"
                                                                name="Damageormissingorfortesting"
                                                                value="{{ $pe->Damageormissingorfortesting }}">

                                                            <p>Remaining Stocks:</p>
                                                            <input class="form-control" type="text"
                                                                name="RemainingStocks"
                                                                value="{{ $pe->RemainingStocks }}">

                                                            <p>Upcoming Stocks:</p>
                                                            <input class="form-control" type="text"
                                                                name="UpcomingStocks" value="{{ $pe->UpcomingStocks }}">

                                                            <p>Remarks:</p>
                                                            <input class="form-control" type="text" name="Remarks"
                                                                value="{{ $pe->Remarks }}">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <div class="btn">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Edit</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                        @if (Session::has('message'))
                                            <script>
                                                swal("message", "Successfully Edited", "success", {
                                                    button: "okay",
                                                });
                                            </script>
                                        @endif
                                    </div>


                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $pe->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel{{ $pe->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $pe->id }}">
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
                                                    <form action="{{ route('Parts-of-eloading.delete', $pe->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Session::has('message delete'))
                                        <script>
                                            swal("message", "Successfully Deleted", "success", {
                                                button: "okay",
                                            });
                                        </script>
                                    @endif
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
