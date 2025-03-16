<?php include_once './views/layout/header.php'; ?><!-- header -->

<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Chi tiết tài khoản</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?= BASE_URL ?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="<?= BASE_URL . '?act=detail-account-khach-hang' ?>">Tài khoản</a></li>
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
                        <li>
                            <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Tài khoản cá nhân</h6>
                            <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <form action="<?= BASE_URL . '?act=update-taikhoan' ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">

                                                <div class="row">
                                                    <label>Tên tài khoản</label>
                                                    <div class="col-md-12 form-input form">
                                                        <input type="text" placeholder="Nhập tên tài khoản" name="ho_ten" id="ho_ten" value="<?= $detailAccount['ho_ten'] ?>" require>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email</label>
                                                <div class="form-input form">
                                                    <input type="Email" placeholder="Nhập Email" name="email" id="email" value="<?= $detailAccount['email'] ?>" require>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Số điện thoại</label>
                                                <div class="form-input form">
                                                    <input type="number" placeholder="Nhập số điện thoại" name="so_dien_thoai" id="so_dien_thoai" value="<?= $detailAccount['so_dien_thoai'] ?>" require>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Địa chỉ</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Vui lòng nhập địa chỉ" name="dia_chi" id="dia_chi" value="<?= $detailAccount['dia_chi'] ?>" require>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Ngày sinh</label>
                                                <div class="form-input form">
                                                    <input type="date" placeholder="Vui lòng chọn ngày sinh" name="ngay_sinh" id="ngay_sinh" value="<?= $detailAccount['ngay_sinh'] ?>" require>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Giới tính</label>
                                                <div class="select-items">
                                                    <select name="gioi_tinh" id="gioi_tinh" class="form-control custom-select">
                                                        <option <?= $detailAccount['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                                        <option <?= $detailAccount['gioi_tinh'] == 2 ? 'selected' : '' ?> value="2">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Mật khẩu cũ</label>
                                                <div class="form-input form">
                                                    <input type="password" name="old_pass" placeholder="Nhập mật khẩu cũ" require>
                                                    <?php if (isset($_SESSION['e']['old_pass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['e']['old_pass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Mật khẩu mới</label>
                                                <div class="form-input form">
                                                    <input type="password" name="new_pass" placeholder="Nhập mật khẩu mới" require>
                                                    <?php if (isset($_SESSION['e']['new_pass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['e']['new_pass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['success'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['success'] ?></p>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button type="submit" class="btn" value="Save Changes">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Checkout Form Steps Part Ends ======-->

<?php include_once './views/layout/footer.php'; ?><!-- footer -->