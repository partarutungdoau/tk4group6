<?php 
  $userdata = Session::get('set_userdata');
?>
<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
    </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <ul class="navbar-nav align-items-center">
        <li class="nav-item d-flex align-items-center me-5">
        <div class="avatar flex-shrink-0 me-2">
            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-dollar-circle"></i></span>
        </div>
        <div class="me-2">
            <small class="text-muted d-block">Total Stock Price</small>
            <h6 class="mb-0">Rp. {{number_format($stock_price,'0','.','.')}}</h6>
        </div>
        </li>
        <li class="nav-item d-flex align-items-center me-5 d-none d-lg-flex">
        <div class="avatar flex-shrink-0 me-2">
            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-shopping-bag"></i></span>
        </div>
        <div class="me-2">
            <small class="text-muted d-block">Profit</small>
            <h6 class="mb-0">Rp. {{number_format($income,'0','.','.')}}</h6>
        </div>
        </li>
        <li class="nav-item d-flex align-items-center d-none d-lg-flex">
        <div class="avatar flex-shrink-0 me-2">
            <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-log-in-circle"></i></span>
        </div>
        <div class="me-2">
            <small class="text-muted d-block">Expenses</small>
            <h6 class="mb-0">Rp. {{number_format($expanses,'0','.','.')}}</h6>
        </div>
        </li>
    </ul>

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <li>

        <span class="fw-semibold d-block">{{isset($userdata['name']) ? $userdata['name'] : '-'}}</span>
        </li>
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
            <img src="{{asset('assets/img/avatars/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
            </div>
        </a>
        
        
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
            <a class="dropdown-item" href="#">
                <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                    <img src="{{asset('assets/img/avatars/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </div>
                <div class="flex-grow-1">
                    <span class="fw-semibold d-block">{{isset($userdata['name']) ? $userdata['name'] : '-'}}</span>
                    <small class="text-muted">{{isset($userdata['role']) ? $userdata['role'] : '-'}}</small>
                </div>
                </div>
            </a>
            </li>
            <li>
            <div class="dropdown-divider"></div>
            </li>
            <li>
            <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
            </a>
            </li>
            <li>
            <a class="dropdown-item" href="#">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
            </a>
            </li>
            <li>
            <a class="dropdown-item" href="#">
                <span class="d-flex align-items-center align-middle">
                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                <span class="flex-grow-1 align-middle">History</span>
                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                </span>
            </a>
            </li>
            <li>
            <div class="dropdown-divider"></div>
            </li>
            <li>
            <a class="dropdown-item" href="{{asset('/logout')}}">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
            </a>
            </li>
        </ul>
        </li>
        <!--/ User -->

    </ul>
    </div>
</nav>