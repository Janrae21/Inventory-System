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
                    <form action="{{route('status.export')}}" method="POST" target="_blank">
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
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productStatus as $item)
                                    <tr>
                                        <td> {{ ! is_null($item->customer) ? $item->customer->name : "" }} </td>
                                        <td>
                                            <p>{{ $item->item_name }}</p>
                                        </td>
                                        <td> {{ $item->quantity_sold }} </td>
                                        <td> {{ $item->category }} </td>
                                        <td>{{ $item->shipment_status }}</td>
                                        <td>
                                            <a style="color: #FF6767; padding: 10px; cursor: pointer;" href="#"
                                                data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i
                                                    class='bx bxs-trash'></i> Delete </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                                                        Confirm
                                                        Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this Customer?
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{ route('status.delete', $item->id) }}"
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
                                    @if (Session::has('message delete'))
                                        <script>
                                            swal("message", "Successfully Deleted", "success", {
                                                button: "okay",
                                                style:"justify-content:center",
                                            });
                                        </script>
                                    @endif

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- CONTENT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/status.js') }}"></script>


    </body>

    </html>
