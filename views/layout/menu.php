<!-- Start phần thanh trên hearder -->
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="nav-inner">
                <!-- Start Navbar -->
                <nav class="navbar navbar-expand-lg" style="margin: 0 auto;">
                    <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>" class="active" aria-label="Toggle navigation">Home</a>
                            </li>
                            <li class="nav-item"><a class="dd-menu collapsed" href="javascript:void(0)"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">Danh mục</a>
                                <ul class="sub-menu collapse" id="submenu-1-2">
                                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                                        <li class="nav-item"><a href="<?= BASE_URL . '?act=list-product&id_danh_muc=' . $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="dd-menu collapsed" href="javascript:void(0)"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">Sản phẩm</a>
                                <ul class="sub-menu collapse" id="submenu-1-3">
                                    <li class="nav-item"><a href="<?= BASE_URL. '?act=list-product'?>">Danh sách sản phẩm</a></li>
                                    <!-- <li class="nav-item"><a href="product-details.html">Chi tiết sản phẩm</a></li> -->
                                    <?php if (isset($_SESSION['user-account'])) { ?>
                                    <li class="nav-item"><a href="<?= BASE_URL . '?act=gio-hang' ?>">Xem giỏ hàng</a>
                                    <!-- <li class="nav-item"><a href="checkout.html">Checkout(thanh toán)</a></li> -->
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </div> <!-- navbar collapse -->
                </nav>
                <!-- End Navbar -->
            </div>
        </div>

    </div>
</div>
<!-- End phần thanh trên hearder -->
</header>
<!-- End Header Area -->