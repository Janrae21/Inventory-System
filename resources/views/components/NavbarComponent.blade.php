<head>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<div class="profile-group">
    <div style="width: 100%" class="show-when-mobile">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round" onclick="showNav()">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 6l16 0" />
            <path d="M4 12l16 0" />
            <path d="M4 18l16 0" />
        </svg>
    </div>
    <div class="show-when-web">
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
    </div>
    <li class="nav-item dropdown">

        <a id="navbarDropdown" class="nav-link dropdown-toggle show-when-mobile" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img style="width: 20px; height: 20px" src="{{ asset('images/userlogo.png') }}" alt="">
        </a>

        <a id="navbarDropdown" class="nav-link dropdown-toggle show-when-web" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a href="{{ asset('view-profile') }}">
                <i class='bx bxs-user'></i>
                <span class="text">View Profile</span>
            </a>

            <a class="show-when-mobile">
                <input type="checkbox" id="switch-mode" hidden>
                <label style="width: 50px" for="switch-mode" class="switch-mode"></label>
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</div>

<script>
    var showNavigation = document.getElementById('sidebar');
    function showNav() {
        showNavigation.style.width = '250px';
    }
</script>

<style scoped>
    .show-when-mobile {
        display: none;
    }

    @media screen and (max-width: 768px) {
        .show-when-mobile {
            display: block;
        }

        .show-when-web {
            display: none;
        }
</style>