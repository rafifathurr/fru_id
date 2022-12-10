<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Admin
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                    
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ $title === 'Dashboard' ? 'active' : '' }}">
                    <a href="{{route('dashboard.index')}}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ $title === 'List Order' || $title === 'Add Order' || $title === 'Edit Order' || $title === 'Detail Order'? 'active' : '' }}">
                    <a href="{{route('order.index')}}" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li class="nav-item {{ $title === 'List Products' || $title === 'Add Products' || $title === 'Edit Products' || $title === 'Detail Products'? 'active' : '' }}">
                    <a href="{{route('product.index')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-boxes"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li
                    class="nav-item {{ $title === 'List Supplier' || $title === 'Add Supplier' || $title === 'Edit Supplier' || $title === 'Detail Supplier'? 'active' : '' }}">
                    <a href="{{route('supplier.index')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-warehouse"></i>
                        <p>Master Supplier</p>
                    </a>
                </li>
                <li class="nav-item {{ $title === 'List Category Product' || $title === 'Add Category Product' || $title === 'Edit Category Product' || $title === 'Detail Category Product'? 'active' : '' }}">
                    <a href="{{route('category.index')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-th"></i>
                        <p>Master Category</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ $title === 'List Source Payment' || $title === 'Add Source Payment' || $title === 'Edit Source Payment' || $title === 'Detail Source Payment'? 'active' : '' }}">
                    <a href="{{route('source_payment.index')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-wallet"></i>
                        <p>Master Payment</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">User Management</h4>
                </li>
                <li class="nav-item {{ $title === 'List User' || $title === 'Add User' || $title === 'Edit User' || $title === 'Detail User'? 'active' : '' }}"">
                    <a href="{{route('users.index')}}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-user-plus"></i>
                        <p>Create User</p>
                    </a>
                </li>
                <li class="nav-item {{ $title === 'List User Roles' || $title === 'Add User Roles' || $title === 'Edit User Roles' || $title === 'Detail User Roles'? 'active' : '' }}">
                    <a href="{{route('role.index')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user-cog"></i>
                        <p>User Role</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
