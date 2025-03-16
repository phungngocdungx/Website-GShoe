<?php include_once 'layout/header.php'; ?><!-- header -->
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Thanh toán</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?= BASE_URL ?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="<?= BASE_URL . '?act=gio-hang' ?>">Giỏ hàng</a></li>
                    <li>Thanh toán</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!--====== Checkout Form Steps Part Start ======-->

<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="checkout-steps-form-style-1">
                    <ul id="accordionExample">
                        <form action="<?= BASE_URL . '?act=datHang' ?>" method="post">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">
                                    <Td>Thông tin người nhận</Td>
                                </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Tên người nhận</label>
                                                <div class="row">
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" placeholder="Nhập tên người nhận" name="ten_nguoi_nhan" id="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email người nhận</label>
                                                <div class="form-input form">
                                                    <input type="email" placeholder="Nhập địa chỉ Email" name="email_nguoi_nhan" id="email_nguoi_nhan" value="<?= $user['email'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Số điện thoại</label>
                                                <div class="form-input form">
                                                    <input type="number" placeholder="Nhập số điện thoại" name="sdt_nguoi_nhan" id="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Địa chỉ người nhận</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Nhập địa chỉ người nhận" name="dia_chi_nguoi_nhan" id="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Ghi chú đơn hàng</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Nhập ghi chú đơn hàng" name="ghi_chu" id="ghi_chu">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                    aria-expanded="false" aria-controls="collapsefive">Thông tin thanh toán</h6>
                                <section class="checkout-steps-form-content collapse" id="collapsefive"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkout-payment-form">
                                                <div class="single-form form-default">
                                                    <label>Cardholder Name</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Cardholder Name">
                                                    </div>
                                                </div>
                                                <div class="single-form form-default">
                                                    <label>Card Number</label>
                                                    <div class="form-input form">
                                                        <input id="credit-input" type="text"
                                                            placeholder="0000 0000 0000 0000">
                                                        <img src="assets/images/payment/card.png" alt="card">
                                                    </div>
                                                </div>
                                                <div class="payment-card-info">
                                                    <div class="single-form form-default mm-yy">
                                                        <label>Expiration</label>
                                                        <div class="expiration d-flex">
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="MM">
                                                            </div>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="YYYY">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>CVC/CVV <span><i
                                                                    class="mdi mdi-alert-circle"></i></span></label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="***">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <div class="single-form form-default button">
                                <button class="btn">Đặt hàng</button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-sidebar">

                    <div class="checkout-sidebar-price-table mt-30">
                        <?php $tongGioHang = 0; ?>
                        <?php foreach ($chiTietGioHang as $sanPham): ?>

                            <?php


                            $tongTien = 0;
                            if ($sanPham['gia_khuyen_mai']) {
                                $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                            } else {
                                $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                            }
                            $tongGioHang += $tongTien;
                            ?>
                        <?php endforeach ?>
                        <h5 class="title">Thông tin sản phẩm</h5>
                        <div class="sub-total-price">
                            <div class="total-price">
                                <p class="value">Tổng phụ:</p>
                                <p class="price"><?= formatPrice($tongGioHang) . ' VND' ?></p>
                            </div>
                            <div class="total-price shipping">
                                <p class="value">Phí ship:</p>
                                <p class="price">30.000 VND</p>
                            </div>

                        </div>

                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Thành tiền:</p>
                                <p class="price"><?= formatPrice($tongGioHang + 30000) . ' VND' ?></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!--====== Checkout Form Steps Part Ends ======-->



<?php include_once 'layout/footer.php'; ?><!-- footer -->