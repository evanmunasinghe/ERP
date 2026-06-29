<style>
    #sidebar-wrapper { min-height: 100vh; width: 250px; background-color: #212529; }
    #sidebar-wrapper .sidebar-heading { padding: 1.5rem; font-size: 1.2rem; color: #fff; font-weight: bold; border-bottom: 1px solid #343a40; }
    #sidebar-wrapper .list-group-item { background: none; border: none; color: #c2c7d0; padding: 0.75rem 1.5rem; }
    #sidebar-wrapper .list-group-item:hover, #sidebar-wrapper .list-group-item.active { background-color: #343a40; color: #fff; }
</style>

<div id="sidebar-wrapper" class="no-print">
    <a href="{{ route('dashboard') }}" class="sidebar-heading d-block text-decoration-none"><i class="fa-solid fa-gears text-info me-2"></i> Nexus ERP</a>
    <div class="list-group list-group-flush mt-3">
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('users.*') ? 'active' : '' }}"><i class="fa-solid fa-users-gear me-2"></i> Users</a>
        <a href="{{ route('customers.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('customers.*') ? 'active' : '' }}"><i class="fa-solid fa-address-book me-2"></i> Customers</a>
        <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('products.*') ? 'active' : '' }}"><i class="fa-solid fa-boxes-stacked me-2"></i> Products</a>
        <a href="{{ route('invoices.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('invoices.*') ? 'active' : '' }}"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Invoices</a>
    </div>
</div>
