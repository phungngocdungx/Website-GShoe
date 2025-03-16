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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Sửa thông tin tài khoản khách hàng: <?= $khachHang['ho_ten']?></h4>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-khach-hang' ?>" method="POST">
                            <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id']?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control form-control-border" name="ho_ten"
                                        placeholder="Nhập họ tên" value="<?= $khachHang['ho_ten']?>">
                                    <?php if (isset($_SESSION['e']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control form-control-border" name="email"
                                        placeholder="Nhập email" value="<?= $khachHang['email']?>">
                                    <?php if (isset($_SESSION['e']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control form-control-border" name="so_dien_thoai"
                                        placeholder="Nhập số điện thoại" value="<?= $khachHang['so_dien_thoai']?>">
                                    <?php if (isset($_SESSION['e']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['so_dien_thoai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input type="date" class="form-control form-control-border" name="ngay_sinh"
                                        placeholder="Chọn ngày sinh" value="<?= $khachHang['ngay_sinh']?>">
                                    <?php if (isset($_SESSION['e']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['ngay_sinh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select name="gioi_tinh" id="inputStatus" class="form-control custom-select">
                                        <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                        <option <?= $khachHang['gioi_tinh'] !== 1 ? 'selected' : '' ?> value="2">Nữ</option>
                                    </select>
                                    <?php if (isset($_SESSION['e']['gioi_tinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['gioi_tinh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control form-control-border" name="dia_chi"
                                        placeholder="Nhập địa chỉ" value="<?= $khachHang['dia_chi']?>">
                                    <?php if (isset($_SESSION['e']['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['dia_chi'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                                        <option <?= $khachHang['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
                                    </select>
                                    <?php if (isset($_SESSION['e']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
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