<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <!-- Navigation Label -->
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">LAB SCHOOL</div>
        <ul class="pcoded-item pcoded-left-item">
            <!-- Dashboard Link -->
            <li class="{{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!-- Data Kelas Link -->
            <li class="{{ Route::currentRouteName() == 'classes.index' ? 'active' : '' }}">
                <a href="{{ route('classes.index') }}">
                    <span class="pcoded-micon"><i class="ti-layout"></i><b>K</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.classes.main">Data Kelas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!-- Data Siswa Link -->
            <li class="{{ Route::currentRouteName() == 'student.index' ? 'active' : '' }}">
                <a href="{{ route('student.index') }}">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>S</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.student.main">Data Siswa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!-- Data SPP Link -->
            <li class="{{ Route::currentRouteName() == 'spp.index' ? 'active' : '' }}">
                <a href="{{ route('spp.index') }}">
                    <span class="pcoded-micon"><i class="ti-wallet"></i><b>P</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.spp.main">Data SPP</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!-- Transaksi Link -->
            <li class="{{ Route::currentRouteName() == 'payment.create' ? 'active' : '' }}">
                <a href="{{ route('payment.create') }}">
                    <span class="pcoded-micon"><i class="ti-receipt"></i><b>T</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.transaction.main">Transaksi</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!-- History Pembayaran Link -->
            <li class="{{ Route::currentRouteName() == 'payment.index' ? 'active' : '' }}">
                <a href="{{ route('payment.index') }}">
                    <span class="pcoded-micon"><i class="ti-time"></i><b>H</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.history.main">History Pembayaran</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <!-- Account Section -->
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">ACCOUNT PAGES</div>
        <ul class="pcoded-item pcoded-left-item">
            <!-- Pengguna Link -->
            <li class="{{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}">
                    <span class="pcoded-micon"><i class="ti-id-badge"></i><b>U</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.user.main">Pengguna</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
