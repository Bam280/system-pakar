<nav class="navbar navbar-expand justify-content-between fixed-top">
    <a class="navbar-brand mb-0 h1 d-none d-md-block" href="#">
        <img src="{{ asset('img') }}/Pakar.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
        @if (Request::is('profile'))
            Profile
        @else
            Dashboard
        @endif
    </a>

    <form class="form-inline form-quicksearch d-none d-md-block mx-auto">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-icon">
                    <i data-feather="search"></i>
                </div>
            </div>
            <input type="text" class="form-control" id="search" placeholder="Type to search...">
        </div>
    </form>

    <div class="d-flex flex-1 d-block d-md-none">
        <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
        </a>
    </div>

    <ul class="navbar-nav d-flex justify-content-end mr-2">
        <!-- Notificatoins -->
        {{-- <li class="nav-item dropdown d-flex align-items-center mr-2">
            <a class="nav-link nav-link-notifications" id="dropdownNotifications" data-toggle="dropdown" href="#">
                <i class="oi oi-bell display-inline-block align-middle"></i>
                <span class="nav-link-notification-number">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notifications"
                aria-labelledby="dropdownNotifications">
                <div class="notifications-header d-flex justify-content-between align-items-center">
                    <span class="notifications-header-title">
                        Notifications
                    </span>
                    <a href="#" class="d-flex"><small>Mark all as read</small></a>
                </div>

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action unread">
                        <p class="mb-1">Invitation for <strong>Lunch</strong> on <strong>Jan 12th 2018</strong> by
                            <strong>Laura</strong>
                        </p>

                        <div class="mb-1">
                            <button type="button" class="btn btn-primary btn-sm">Accept invite</button>
                            <button type="button" class="btn btn-outline-danger btn-sm">Decline</button>
                        </div>

                        <small>1 hour ago</small>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <p class="mb-1"><strong class="text-success">Goal completed</strong><br />1,000 new members
                            today</p>
                        <small>3 days ago</small>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <p class="mb-1 text-danger"><strong>System error detected</strong></p>
                        <small>3 days ago</small>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <p class="mb-1">Your task <strong>Design Draft</strong> is due today.</p>
                        <small>4 days ago</small>
                    </a>
                </div>

                <div class="notifications-footer text-center">
                    <a href="#"><small>View all notifications</small></a>
                </div>
            </div>
        </li> --}}
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-square" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path
                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                </svg>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">My Profile</a>
                <div class="dropdown-divider"></div>
                @if (Request::is('profile'))
                    <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                    <div class="dropdown-divider"></div>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link class="text-danger" :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </li>
    </ul>
</nav>
