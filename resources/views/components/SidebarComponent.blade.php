<head>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<section id="sidebar">
            <a href="#" class="brand">
                <img src="{{ asset('images/logo.png') }}">
            </a>
            <ul class="side-menu top">
                <li>
                    <a href="{{ asset('/admin/home') }}">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="dropdown-btn">
                    <a href="{{ url('#') }}">
                        <i class='bx bxs-cart'></i>
                        <span class="text">Product</span>
                    </a>
                <li class="drop-item">
                    <a href="{{ url('/pisowifi-parts-accessories') }}">
                        <span class="text">Pisowifi Parts & Accessories</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/packaging-monitoring') }}">
                        <span class="text">Packaging Monitoring</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/Parts-of-eloading') }}">
                        <span class="text">Parts Of Eloading</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/eloading-best-seller') }}">
                        <span class="text">Eloading Best Seller</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ url('/physical-store-computer-stocks-monitoring') }}">

                        <span class="text">Physical Store Computer Stocks Monitoring</span>
                    </a>
                </li>
                </li>
                <li>
                    <a href="{{ url('/status') }}">
                        <i class='bx bx-stats'></i>
                        <span class="text">Product Status</span>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('/customer') }}">
                        <i class='bx bxs-group'></i>
                        <span class="text">Customer Lists</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/ranking') }}">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <span class="text">Ranking</span>
                    </a>
                </li>
            </ul>
        </section>
        <script src="{{ asset('js/sidebar.js') }}"></script>