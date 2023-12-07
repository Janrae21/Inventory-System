<head>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<div id="sidebar">
    <div style="float: right;" class="show-when-mobile">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-arrow-left-filled"
            width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round" onclick="hideNav()">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M12 2a10 10 0 0 1 .324 19.995l-.324 .005l-.324 -.005a10 10 0 0 1 .324 -19.995zm.707 5.293a1 1 0 0 0 -1.414 0l-4 4a1.048 1.048 0 0 0 -.083 .094l-.064 .092l-.052 .098l-.044 .11l-.03 .112l-.017 .126l-.003 .075l.004 .09l.007 .058l.025 .118l.035 .105l.054 .113l.043 .07l.071 .095l.054 .058l4 4l.094 .083a1 1 0 0 0 1.32 -1.497l-2.292 -2.293h5.585l.117 -.007a1 1 0 0 0 -.117 -1.993h-5.586l2.293 -2.293l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                stroke-width="0" fill="currentColor" />
        </svg>
    </div><br><br>
    <a class="brand">
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
            <a href="{{ url('/Parts-of-eloading') }}">
                <span class="text">Eloading Parts and Accessories</span>
            </a>
        </li>
        <li class="drop-item">
            <a href="{{ url('/packaging-monitoring') }}">
                <span class="text">Packaging</span>
            </a>
        </li>
        <!-- <li class="drop-item">
                    <a href="{{ url('/eloading-best-seller') }}">
                        <span class="text">Eloading Best Seller</span>
                    </a>
                </li> -->
        <li class="drop-item">
            <a href="{{ url('/physical-store-computer-stocks-monitoring') }}">

                <span class="text">Physical Store Computer Stocks </span>
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
                <span class="text">Customers</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/ranking') }}">
                <i class='bx bxs-bar-chart-alt-2'></i>
                <span class="text">Ranking</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/user-management') }}">
                <i class='bx bxs-bar-chart-alt-2'></i>
                <span class="text">User Management</span>
            </a>
        </li>

        <li>
            <a href="{{ asset('/view-profile') }}">
                <i class='bx bxs-group'></i>
                <span class="text">View Profile</span>
            </a>
        </li>
    </ul>
</div>

<script>
    var hideNavigation = document.getElementById("sidebar");

    function hideNav() {
        hideNavigation.style.width = "0px";
    }
</script>
<script src="{{ asset('js/sidebar.js') }}"></script>
