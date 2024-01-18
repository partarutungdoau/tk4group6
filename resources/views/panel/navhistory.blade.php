<div class="row d-none d-md-block">
    <div class="col">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
        <a class="nav-link {{request()->is('sales-history') ? 'active' :''}}" href="{{asset('sales-history')}}"><i class="bx bx-history me-1"></i>
            Sales History</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link {{request()->is('restock-history') ? 'active' :''}}" href="{{asset('restock-history')}}"><i class="bx bx-history me-1"></i>
            Restock History</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link {{request()->is('capital-history') ? 'active' :''}}" href="{{asset('capital-history')}}"><i class="bx bx-history me-1"></i>
            Capital History</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{request()->is('other-history') ? 'active' :''}}" href="{{asset('other-history')}}"><i class="bx bx-history me-1"></i>
            Other History</a>
        </li>
    </ul>
    </div>
</div>