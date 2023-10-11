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
                    <a href="#" class="btn-download">
                        <i class='bx bxs-cloud-download'></i>
                        <span class="text">Download Excel</span>
                    </a>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Product Status</h3>
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
                                            <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="">
                                            <div class="modal-body">
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">search
                                                        Items</span>
                                                    <input type="text" name="Items" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-sm">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Category</label>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option value="Category">Category</option>
                                                        <option value="PisoWifi">PisoWifi</option>
                                                        <option value="E-Loading">E-Loading</option>
                                                        <option value="Gadgets">Gadgets</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <span>Date</span>
                                                <input type="date" name="Date" class="form-control">

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Quantity</label>
                                                    <input class="form-control" id="exampleFormControlSelect1">
                                                    </input>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                style="width:150px; height:50px, border-radius:5px; background-color: red; border-style:none">
                                <i class='bx bx-minus-circle' style="font-size:20px; color:white;">Remove</i>
                            </button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Ordered Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <p>Mary Joy Reambonanza</p>
                                    </td>
                                    <td>1</td>
                                    <td>E-Loading Machine</td>
                                    <td>01-10-2021</td>
                                    <td>
                                        <button class="button" style="background:#55555; color: black;">
                                            SELECT STATUS
                                        </button>
                                    </td>
                                    <td>
                                        <button class="button" style="background: green; color: white;">
                                            Save Changes
                                        </button>
                                        <button class="button" style="background: red; color: white; margin-left: 30px;">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Mary Joy Reambonanza</p>
                                    </td>
                                    <td>1</td>
                                    <td>E-Loading Machine</td>
                                    <td>01-10-2021</td>
                                    <td>
                                        <button class="button">
                                            SELECT STATUS
                                        </button>
                                    </td>
                                    <td>
                                        <button class="button" style="background: green; color: white;">
                                            Save Changes
                                        </button>
                                        <button class="button" style="background: red; color: white; margin-left: 30px;">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>John Doe</p>
                                    </td>
                                    <td>5</td>
                                    <td>Piso Wifi</td>
                                    <td>01-10-2021</td>
                                    <td>
                                        <button class="button">
                                            SELECT STATUS
                                        </button>
                                    </td>
                                    <td>
                                        <button class="button" style="background: green; color: white;">
                                            Save Changes
                                        </button>
                                        <button class="button" style="background: red; color: white; margin-left: 30px;">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <p>Rogina Rolloque</p>
                                    </td>
                                    <td>2</td>
                                    <td>Cellphone</td>
                                    <td>01-10-2021</td>
                                    <td>
                                        <button class="button">
                                            SELECT STATUS
                                        </button>
                                    </td>
                                    <td>
                                        <button class="button" style="background: green; color: white;">
                                            Save Changes
                                        </button>
                                        <button class="button" style="background: red; color: white; margin-left: 30px;">
                                            Cancel
                                        </button>
                                    </td>

                                </tr>
                                <tr>
                                    <td>

                                        <p>Seth Obenita</p>
                                    </td>
                                    <td>8</td>
                                    <td>E-Loading Parts</td>
                                    <td>01-10-2021</td>
                                    <td>
                                        <button class="button">
                                            SELECT STATUS
                                        </button>
                                    </td>
                                    <td>
                                        <button class="button" style="background: green; color: white;">
                                            Save Changes
                                        </button>
                                        <button class="button" style="background: red; color: white; margin-left: 30px;">
                                            Cancel
                                        </button>
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
        <script src="{{ asset('js/status.js') }}"></script>


    </body>

    </html>
