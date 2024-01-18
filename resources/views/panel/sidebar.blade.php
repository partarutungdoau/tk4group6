<?php 
  $userdata = Session::get('set_userdata');
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ ($userdata['role']=='Admin') ? asset('/') : asset('/cashier') }}" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{asset('assets/img/logo.jpg')}}" alt class="w-px-30 h-auto rounded-circle" />
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">ATK</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if($userdata['role'] == 'Admin')
        
        <!-- Dashboard -->
        <li class="menu-item {{request()->is('/') ? 'active' :''}}">
        <a href="{{asset('/')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
        </li>
        <!-- Admin -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>

        <!-- Inventory -->
        <li class="menu-item {{request()->is('inventory') ? 'active' :''}}">
        <a href="{{asset('inventory')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-package"></i>
            <div data-i18n="Inventory">Inventory</div>
        </a>
        </li>

        <!-- Purchase Order -->
        <li class="menu-item  {{request()->is('purchase-order') ? 'active' :''}}">
        <a href="{{asset('purchase-order')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
            <div data-i18n="Purchase Order">Purchase Order</div>
        </a>
        </li>

        <!-- Category -->
        <li class="menu-item {{request()->is('category') ? 'active' :''}}">
        <a href="{{asset('category')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-category-alt"></i>
            <div data-i18n="Category">Category</div>
        </a>
        </li>

        <!-- Finance Manager -->
        <li class="menu-item {{request()->is('finance') ? 'active' :''}}">
        <a href="{{asset('finance')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-folder-open"></i>
            <div data-i18n="Finance Manager">Finance Manager</div>
        </a>
        </li>

        <!-- History -->
        <li class="menu-item {{request()->is('sales-history') || request()->is('restock-history') || request()->is('capital-history') || request()->is('other-history') ? 'active open' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-history"></i>
                <div data-i18n="History">History</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{request()->is('sales-history') ? 'active' :''}}">
                <a href="{{asset('sales-history')}}" class="menu-link">
                    <div data-i18n="Sales">Sales History</div>
                </a>
                </li>
                <li class="menu-item {{request()->is('restock-history') ? 'active' :''}}">
                <a href="{{asset('restock-history')}}" class="menu-link">
                    <div data-i18n="Restock">Restock History</div>
                </a>
                </li>
                <li class="menu-item  {{request()->is('capital-history') ? 'active' :''}}">
                <a href="{{asset('capital-history')}}" class="menu-link">
                    <div data-i18n="Restock">Capital History</div>
                </a>
                </li>
                <li class="menu-item {{request()->is('other-history') ? 'active' :''}}">
                <a href="{{asset('other-history')}}" class="menu-link">
                    <div data-i18n="Other">Other History</div>
                </a>
                </li>
            </ul>
        </li>

        <!-- User -->
        <li class="menu-item {{request()->is('user') ? 'active' :''}}">
            <a href="{{asset('user')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user-circle"></i>
              <div data-i18n="Supplier">User</div>
            </a>
          </li>

        <!-- Supplier -->
        <li class="menu-item {{request()->is('supplier') ? 'active' :''}}">
        <a href="{{asset('supplier')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user-pin"></i>
            <div data-i18n="Supplier">Supplier</div>
        </a>
        </li>

        <!-- Discount -->
        <li class="menu-item {{request()->is('discount') ? 'active' :''}}">
        <a href="{{asset('discount')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-basket"></i>
            <div data-i18n="Discount">Discount</div>
        </a>
        </li>
        @elseif($userdata['role'] == 'Staff')
        <!-- Cashier -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Cashier</span></li>

        <!-- Cashier -->
        <li class="menu-item {{request()->is('cashier') ? 'active' :''}}">
        <a href="{{asset('cashier')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-cart-alt"></i>
            <div data-i18n="Cashier">Cashier</div>
        </a>
        </li>

        <!-- Product -->
        <li class="menu-item {{request()->is('product') ? 'active' :''}}">
        <a href="{{asset('product')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-package"></i>
            <div data-i18n="Product">Product</div>
        </a>
        </li>
        @endif

    </ul>
</aside>