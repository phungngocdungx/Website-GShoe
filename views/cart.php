<?php include_once 'layout/header.php'; ?><!-- header -->
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Giỏ hàng</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.html">Shop</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <!-- Cart List Title -->
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">

                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Tên sản phẩm</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Số lượng</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Giá sản phẩm</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Tổng tiền</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Xóa</p>
                    </div>
                </div>
            </div>
            <!-- End Cart List Title -->
            <!-- Cart Single List list -->
            <?php $tongGioHang = 0;?>
            <?php foreach ($chiTietGioHang as $sanPham): ?>
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="product-details.html">
                                    <?= $sanPham['ten_san_pham'] ?> </a></h5>
                            <p class="product-des">
                                <span><em>Size:</em> 41</span>
                                <span><em>Color:</em> White</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <input style="width: 120px; height: 46px;" class="form-control" type="number" value="<?= $sanPham['so_luong']?>" name="so_luong" id="so_luong">
                               
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                <p><?= formatPrice($sanPham['gia_khuyen_mai']) . ' VND' ?></p>
                            <?php } else { ?>
                                <p><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <?php
                            $tongTien = 0;
                            if($sanPham['gia_khuyen_mai']){
                                $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                            }else{
                                $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                            }
                            $tongGioHang += $tongTien;
                            ?>
                            <p><?= formatPrice($tongTien). ' VND'?></p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- End Single List list -->
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Nhập mã giảm giá(nếu có)">
                                        <div class="button">
                                            <button class="btn">Sử dụng mã giảm giá</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Tổng phụ<span><?= formatPrice($tongGioHang). ' VND'?></span></li>
                                    <li>Phí giao hàng<span>30.000 VND</span></li>
                                    <li class="last">Thành tiền<span><?= formatPrice($tongGioHang + 30000). ' VND'?></span></li>
                                </ul>
                                <div class="button">
                                    <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn">Thanh toán</a>
                                    <a href="<?= BASE_URL . '?act=list-product' ?>" class="btn btn-alt">Tiếp tục mua sắm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->
<?php include_once 'layout/footer.php'; ?><!-- footer -->