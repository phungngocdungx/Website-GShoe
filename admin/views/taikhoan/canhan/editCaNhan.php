<?php include './views/layout/header.php'; ?><!-- header -->
<?php include './views/layout/navbar.php'; ?><!-- navbar -->
<?php include './views/layout/sidebar.php'; ?><!-- sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <img style="width: 100px; " src="<?= BASE_URL . $thongTin['anh_dai_dien'] ?>" class="avatar img-circle" alt="anh" onerror="this.onerror=null; this.src='https://png.pngtree.com/png-vector/20190623/ourlarge/pngtree-accountavataruser--flat-color-icon--vector-icon-banner-templ-png-image_1491720.jpg'">

                    </div>
                </div>
                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Thông tin cá nhân</h3>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="POST" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Họ tên: </label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="<?= $thongTin['ho_ten'] ?>" name="ho_ten">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ngày sinh</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" value="<?= $thongTin['ngay_sinh'] ?>" name="ngay_sinh">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Số điện thoại</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="number" value="<?= $thongTin['so_dien_thoai'] ?>" name="so_dien_thoai">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="<?= $thongTin['email'] ?>" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Giới tính</label>

                            <select name="gioi_tinh" id="inputStatus" class="form-control col-lg-8">
                                <option <?= $thongTin['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                <option <?= $thongTin['gioi_tinh'] !== 1 ? 'selected' : '' ?> value="2">Nữ</option>
                            </select>
                            <?php if (isset($_SESSION['e']['email'])) { ?>
                                <p class="text-danger"><?= $_SESSION['e']['email'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Địa chỉ</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="<?= $thongTin['dia_chi'] ?>" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="">
                            </div>
                        </div>
                    </form>
                    <h3>Đổi mật khẩu</h3>
                    <?php if (isset($_SESSION['success'])) { ?>
                        <p class="text-danger"><?= $_SESSION['success'] ?></p>
                        <div class="alert alert-info alert-dismissible">
                            <a class="panel-close close" data-dismiss="alert"></a>
                            <i class="fa fa-coffee"></i>
                            <?= $_SESSION['success'] ?>
                        </div>
                    <?php } ?>

                    <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="post">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mật khẩu cũ</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="old_pass" value="">
                                <?php if (isset($_SESSION['e']['old_pass'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['old_pass'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mậ khẩu mới</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="new_pass" value="">
                                <?php if (isset($_SESSION['e']['new_pass'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['new_pass'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nhập lại mật khẩu</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="confirm_pass" value="">
                                <?php if (isset($_SESSION['e']['confirm_pass'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['confirm_pass'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- <footer></footer> -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->
</body>

</html>