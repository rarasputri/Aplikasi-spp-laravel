<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.html">
                <img class="img-fluid" src="{{asset('gradient/images/logo.png') }}" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <a href="#!">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-pink"></span>
                    </a>
                    <ul class="show-notification">
                        <li>
                            <h6>Notifications</h6>
                            <label class="label label-danger">New</label>
                        </li>

                    </ul>
                </li>

                <li class="user-profile header-notification">
                    <a href="#!">
                        <img src="{{ asset('gradient/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                        <span>{{ Auth::user()->name }}</span> <!-- Displaying the logged-in user's name -->
                        <i class="ti-angle-down"></i>
                    </a>


                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="#!">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="user-profile.html">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>

                        <li>
                            <a href="auth-lock-screen.html">
                                <i class="ti-lock"></i> Lock Screen
                            </a>
                        </li>
                        <li>
                            <a href="{{route('auth.logout')}}">
                            <i class="ti-layout-sidebar-left"></i> Logout
                        </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
