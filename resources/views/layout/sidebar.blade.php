<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{Auth()->user()->name}}</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">{{Auth()->user()->role}}</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2"> Manage Accounts </a>
                <a class="dropdown-item"> Change Password </a>
                <a class="dropdown-item"> Check Inbox </a>
                <a class="dropdown-item"> Sign Out </a>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"></i>
        </button>
      </div>
    </li>
    @if(Auth()->user()->role == 'admin')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="false" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Operator</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/barang/barang-table') }}">
              <i class="menu-icon mdi mdi-table-large"></i>
              <span class="menu-title">Barang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/category') }}">
              <i class="menu-icon mdi mdi-poll-box"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/buttons') }}">Buttons</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/dropdowns') }}">Dropdowns</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Typography</a>
          </li> -->
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/transaksi">
        <i class="menu-icon mdi mdi-coin"></i>
        <span class="menu-title">Transaction</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/laporan/chartjs') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Laporan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/pembeli/pembeli') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title">pembeli</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="false" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>
    @else

    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="false" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Operator</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/barang/barang-table') }}">
              <i class="menu-icon mdi mdi-table-large"></i>
              <span class="menu-title">Barang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/category') }}">
              <i class="menu-icon mdi mdi-poll-box"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/buttons') }}">Buttons</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/dropdowns') }}">Dropdowns</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Typography</a>
          </li> -->
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('/barang/barang-table') }}">
        <i class="menu-icon mdi mdi-table-large"></i>
        <span class="menu-title">Barang</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="false" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>
    @endif
  </ul>
</nav>