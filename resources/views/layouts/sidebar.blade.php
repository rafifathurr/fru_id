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
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#edit">
                                    <span class="link-collapse">Reset Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Log Out</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ ($title ==="Dashboard") ? 'active' : '' }}">
                    <a href="/" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ ($title ==="Order List") ? 'active' : '' }}">
                    <a href="/order/list" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/product/list" aria-expanded="false">
                    <i class="fas fa-boxes"></i>
                        <p>Product</p>
                    </a>
                </li>
                <!-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fas fa-warehouse"></i>
                        <p>Master Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-th"></i>
                        <p>Master Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#" class="collapsed" aria-expanded="false">
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
                <li class="nav-item">
                    <a data-toggle="collapse" href="#" class="collapsed" aria-expanded="false">
                        <i class="fa fa-user-plus"></i>
                        <p>Create User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user-cog"></i>
                        <p>User Role</p>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->s
