<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env("APP_NAME") }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('order/reports')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Order Reports</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('order/sales')}}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Rank Reports</span></a>
    </li>
</ul>
<!-- End of Sidebar -->