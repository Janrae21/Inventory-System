@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
         <img src = "{{asset('images/logo.png')}}">
		</a>
		<ul class="side-menu top">
			<li >
				<a href="{{ url('/') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text" >Dashboard</span>
				</a>
			</li>
			<li >
				<a href="#">
					<i class='bx bxs-cart' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li >
				<a href="{{ url('/status') }}">
					<i class='bx bxs-cart' ></i>
					<span class="text">Product Status</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ url('/customer') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Customer Lists</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/ranking') }}">
					<i class='bx bxs-bar-chart-alt-2' ></i>
					<span class="text">Ranking</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-user' ></i>
					<span class="text">View Profile</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#">Admin User</a>
		</nav>
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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{ url('/') }}">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Excel</span>
				</a>
			</div>
            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Customer Lists</h3>
						<i class='bx bx-plus-circle' style="font-size:24px; color:green;">Add</i>
						<i class='bx bx-minus-circle' style="font-size:24px; color:red;">Remove</i>
					</div>
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
									<button class="button">
										Select Payment Method
									</button>
								</td>
                                <td>230201U1XKYPSP</td>
								<td>
                                    <button class="button">
										Select Shipment Status
									</button>
								</td>
							</tr>
							<tr>
                                    <td>
                                        
                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td> 
                                    <td>
                                        <button class="button">
                                            Select Payment Method
                                        </button>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <button class="button">
                                            Select Shipment Status
                                        </button>
                                    </td>
							</tr>
							<tr>
                                    <td>
                                        
                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td> 
                                    <td>
                                        <button class="button">
                                            Select Payment Method
                                        </button>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <button class="button">
                                            Select Shipment Status
                                        </button>
                                    </td>
							</tr>
							<tr>
                                    <td>
                                        
                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td> 
                                    <td>
                                        <button class="button">
                                            Select Payment Method
                                        </button>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <button class="button">
                                            Select Shipment Status
                                        </button>
                                    </td>
							</tr>
							<tr>
                                    <td>
                                        
                                        <p>10/05/22</p>
                                    </td>
                                    <td>Mary Joy</td>
                                    <td>E-Loading Machine</td> 
                                    <td>
                                        <button class="button">
                                            Select Payment Method
                                        </button>
                                    </td>
                                    <td>230201U1XKYPSP</td>
                                    <td>
                                        <button class="button">
                                            Select Shipment Status
                                        </button>
                                    </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="btn">
					<button type="button" class="btn btn-primary">Update</button>
					<button type="button" class="btn btn-secondary">Cancel</button>
			</div>
		</main>
		
		<!-- MAIN -->
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
	<!-- CONTENT -->
    <script src="{{ asset('js/customer.js') }}"></script>
	
</body>

</html>
@endsection