<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="http://localhost/Website_GShoe/admin/assets/dist/img/logo.svg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GShoe</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN .  '?act=danh-muc' ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN .  '?act=san-pham' ?>" class="nav-link">
                        <i class="nav-icon fas fa-dog"></i>
                        <p>
                            Sản phẩm
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Quản lý tài khoản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản khách hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản cá nhân</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN .  '?act=don-hang' ?>" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p>
                            Đơn hàng
                            
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>