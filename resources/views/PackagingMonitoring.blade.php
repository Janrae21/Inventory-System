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
        <link href="{{ asset('css/PackagingMonitoring.css') }}" rel="stylesheet">
        <title>Packaging-Monitoring</title>
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
                        <h1>Product- Packaging Monitoring</h1>

                    </div>
                    <a href="#" class="btn-download">
                        <i class='bx bxs-cloud-download'></i>
                        <span class="text">Download Excel</span>
                    </a>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            

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
                                @foreach ($packagingmonitoring as $pm)
                                    <tr>
                                        <td style="border: none">
                                            {{ $pm->ItemsName }}
                                        </td>
                                        <td style="border: none">{{ $pm->Status }}</td>
                                        <td style="border: none">{{ $pm->Remarks }}</td>
                                        <td style="width: 30%; border: none">
                                            <a style="width: 135px; padding: 10px; cursor:pointer;"><i
                                                    class='bx bxs-cart'></i> Purchase
                                                Item</a>
                                            <a style="color: #b5a55d; padding: 10px ; cursor:pointer;" href="#"
                                                data-toggle="modal" data-target="#productModal{{ $pm->id }}"><i
                                                    class='bx bxs-show'></i> View</a>
                                            <a style="color: #4CA7DF; padding: 10px ; cursor: pointer;" href="#"
                                                data-toggle="modal" data-target="#productModalEdit{{ $pm->id }}"><i
                                                    class='bx bxs-pencil'></i> Edit</a>
                                            <a style="color: #FF6767; padding: 10px; cursor: pointer;" href="#"
                                                data-toggle="modal" data-target="#deleteModal{{ $pm->id }}"><i
                                                    class='bx bxs-trash'></i> Delete </a>


                                        </td>
                                    </tr>

                                    <!-- View Modal -->
                                    <div class="modal fade" id="productModal{{ $pm->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="productModalLabel{{ $pm->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel{{ $pm->id }}">
                                                        {{ $pm->ItemsName }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Status:</p>
                                                    <input class="form-control" type="text" value="{{ $pm->Status }}"
                                                        disabled>

                                                    <p>Stocks Purchased:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pm->StocksPurchased }}" disabled>

                                                    <p>Actual Stocks Based on Actual Checking:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pm->ActualStocksBasedonactualcheckingEDUD }}" disabled>

                                                    <p>Damage or Missing or Foresting:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pm->Damageormissingorfortesting }}" disabled>

                                                    <p>Remaining Stocks:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pm->RemainingStocks }}" disabled>

                                                    <p>Upcoming Stocks:</p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $pm->UpcomingStocks }}" disabled>

                                                    <p>Remarks:</p>
                                                    <input class="form-control" type="text" value="{{ $pm->Remarks }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Session::has('message'))
                                        <script>
                                            swal("message", "Successfull Edited Item", "success", {
                                                button: "okay",
                                            });
                                        </script>
                                    @endif

                                    <!--Updated Modal-->
                                    <div class="modal fade" id="productModalEdit{{ $pm->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="productModalLabel{{ $pm->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel{{ $pm->id }}">
                                                        {{ $pm->ItemsName }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('packaging-monitoring.update', $pm->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Select Status</label>
                                                                <select name="Status" required class="form-control">
                                                                    <option>Select Status</option>
                                                                    <option value="Ongoing"
                                                                        {{ $pm->Status === 'Ongoing' ? 'selected' : '' }}>
                                                                        Ongoing</option>
                                                                    <option value="Pending"
                                                                        {{ $pm->Status === 'Pending' ? 'selected' : '' }}>
                                                                        Pending</option>
                                                                    <option value="Decline"
                                                                        {{ $pm->Status === 'Decline' ? 'selected' : '' }}>
                                                                        Decline</option>
                                                                </select>
                                                            </div>

                                                            <p>Stocks Purchased:</p>
                                                            <input class="form-control" type="text"
                                                                name="StocksPurchased"
                                                                value="{{ $pm->StocksPurchased }}">

                                                            <p>Actual Stocks Based on Actual Checking:</p>
                                                            <input class="form-control" type="text"
                                                                name="ActualStocksBasedonactualcheckingEDUD"
                                                                value="{{ $pm->ActualStocksBasedonactualcheckingEDUD }}">

                                                            <p>Damage or Missing or Foresting:</p>
                                                            <input class="form-control" type="text"
                                                                name="Damageormissingorforesting"
                                                                value="{{ $pm->Damageormissingorfortesting }}">

                                                            <p>Remaining Stocks:</p>
                                                            <input class="form-control" type="text"
                                                                name="RemainingStocks"
                                                                value="{{ $pm->RemainingStocks }}">

                                                            <p>Upcoming Stocks:</p>
                                                            <input class="form-control" type="text"
                                                                name="UpcomingStocks" value="{{ $pm->UpcomingStocks }}">

                                                            <p>Remarks:</p>
                                                            <input class="form-control" type="text"
                                                                name="Remarks" value="{{ $pm->Remarks }}">
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
                                    </div>
                                    @if (Session::has('message'))
                                        <script>
                                            swal("message", "Deleted Item", "success", {
                                                button: "okay",
                                            });
                                        </script>
                                    @endif

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $pm->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel{{ $pm->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $pm->id }}">
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
                                                    <form action="{{ route('packaging-monitoring.delete', $pm->id) }}"
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
                                    </div>
                                @endforeach


                            </tbody>
                        </table>
                        <br>
                        {{ $packagingmonitoring->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                </div>
            </main>

            <!-- MAIN -->
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/packaging.js') }}"></script>
    </body>

    </html>
