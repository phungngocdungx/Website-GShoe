<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Shop giày thể thao GShoe</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <link href="assets/images/favicon.svg" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Phần hiệu ứng -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- End Phần hiệu ứng -->
    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Phần header -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="<?= BASE_URL ?>">
                            <img src="assets/images/logo/logo.svg" alt="">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <!-- End logo -->

                    <!-- Phần search -->
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-input">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <!-- Phần search -->

                    <!-- Phần yêu thích, giỏ hàng, tài khoản -->
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">

                            <div class="nav-hotline">
                                <i class=""></i>
                                <h3>
                                    <span></span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <!-- Sản phẩm yêu thích -->
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <!-- End sản phẩm yêu thích -->

                                <!-- Phần giỏ hàng -->
                                <?php $tongGioHang = 0; ?>
                                <?php if (isset($_SESSION['user-account'])) { ?>
                                    <div class="cart-items">
                                        <a href="javascript:void(0)" class="main-btn">
                                            <i class="lni lni-cart"></i>
                                            <span class="total-items">2</span>
                                        </a>
                                        <!-- Shopping Item -->
                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                                <span>
                                                    <!-- Số lượng sản phẩm ở giỏ hàng -->
                                                </span>
                                                <a href="<?= BASE_URL . '?act=gio-hang' ?>">Xem giỏ hàng</a>
                                            </div>
                                            <ul class="shopping-list">
                                                <?php foreach ($chiTietGioHang as $sanPham): ?>
                                                    <li>
                                                        <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                                class="lni lni-close"></i></a>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img" href="product-details.html"><img
                                                                    src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="#"></a>
                                                        </div>

                                                        <div class="content">
                                                            <h4><a href="#">
                                                                    <?= $sanPham['ten_san_pham'] ?></a></h4>
                                                            <p class="quantity"><?= 'SL: ' . $sanPham['so_luong'] ?> - <span class="amount">
                                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                                        <?= formatPrice($sanPham['gia_khuyen_mai']) . ' VND' ?>
                                                                    <?php } else { ?>
                                                                        <?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?>
                                                                    <?php } ?>
                                                                </span></p>
                                                        </div>
                                                    </li><?php
                                                    $tongTien = 0;
                                                    if ($sanPham['gia_khuyen_mai']) {
                                                        $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                    } else {
                                                        $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                    }
                                                    $tongGioHang += $tongTien;?>
                                                <?php endforeach ?>
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">

                                                    <span>Giá tiền </span>
                                                    <span class="total-amount"><?= formatPrice($tongGioHang) . ' VND' ?></span>
                                                </div>
                                                <div class="button">
                                                    <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn animate">Thanh toán</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ End Shopping Item -->

                                    </div>
                                <?php } ?>
                                <!-- End Phần giỏ hàng -->

                                <!-- Phần tài khoản  -->
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-user"></i>

                                    </a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <?php if (isset($_SESSION['user-account'])) { ?>
                                            <p class="btn btn-info">
                                                <?= $_SESSION['user-account']; ?>
                                            </p>

                                            <!-- Nút dành cho admin -->
                                            <?php if (isset($_SESSION['user-role']) && $_SESSION['user-role'] == 1) { ?>
                                                <div class="bottom">
                                                    <div class="button">
                                                        <a href="http://localhost/Website_GShoe/admin" class="btn animate">Quản trị</a>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <!-- Nút tài khoản -->
                                            <div class="bottom">
                                                <div class="button">
                                                    <a href="<?= BASE_URL . '?act=detail-account-khach-hang' ?>" class="btn animate">Tài
                                                        khoản</a>
                                                </div>
                                            </div>

                                            <!-- Nút đăng xuất -->
                                            <div class="bottom">
                                                <div class="button">
                                                    <a href="<?= BASE_URL . '?act=logout' ?>" class="btn animate">Đăng xuất</a>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <!-- Nút đăng nhập -->
                                            <div class="bottom">
                                                <div class="button">
                                                    <a href="<?= BASE_URL . '?act=login' ?>" class="btn animate">Đăng nhập</a>
                                                </div>
                                            </div>

                                            <!-- Nút đăng ký -->
                                            <div class="bottom">
                                                <div class="button">
                                                    <a href="<?= BASE_URL . '?act=register' ?>" class="btn animate">Đăng ký</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!--/ End Shopping Item -->

                                </div>
                                <!-- End Phần tài khoản -->
                            </div>
                        </div>
                    </div>
                    <!--  End Phần yêu thích, giỏ hàng, tài khoản -->

                </div>
                <!-- End Phần Header  -->