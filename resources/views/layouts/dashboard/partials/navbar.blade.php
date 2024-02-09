<nav class="navbar navbar-expand justify-content-between fixed-top">
    <a class="navbar-brand mb-0 h1 d-none d-md-block" href="index.html">
        {{-- <img src="./demo/img/logo.png" class="navbar-brand-image d-inline-block align-top mr-2" alt=""> --}}
        AdminX
    </a>

    <div class="d-flex flex-1 d-block d-md-none">
        <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
        </a>
    </div>

    <ul class="navbar-nav d-flex justify-content-end mr-2">
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" class="d-inline-block align-top"
                    alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">My Profile</a>
                <a class="dropdown-item" href="#">My Tasks</a>
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Sign out</button>
                </form>
            </div>
        </li>
    </ul>
</nav>