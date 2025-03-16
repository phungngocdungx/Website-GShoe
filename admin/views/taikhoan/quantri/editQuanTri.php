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
                            <h4 class="card-title">Sửa thông tin tài khoản quản trị: <?= $quanTri['ho_ten']?></h4>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri' ?>" method="POST">
                            <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id']?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control form-control-border" name="ho_ten"
                                        placeholder="Nhập họ tên" value="<?= $quanTri['ho_ten']?>">
                                    <?php if (isset($_SESSION['e']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control form-control-border" name="email"
                                        placeholder="Nhập email" value="<?= $quanTri['email']?>">
                                    <?php if (isset($_SESSION['e']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control form-control-border" name="so_dien_thoai"
                                        placeholder="Nhập số điện thoại" value="<?= $quanTri['so_dien_thoai']?>">
                                    <?php if (isset($_SESSION['e']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['so_dien_thoai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option <?= $quanTri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hoạt động</option>
                                        <option <?= $quanTri['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Không hoạt động</option>
                                    </select>
                                    <?php if (isset($_SESSION['e']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['email'] ?></p>
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