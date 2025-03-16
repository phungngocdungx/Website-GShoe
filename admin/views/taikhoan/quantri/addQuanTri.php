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
                            <h4 class="card-title">Thêm tài khoản</h4>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control form-control-border" name="ho_ten"
                                        placeholder="Nhập họ tên">
                                    <?php if (isset($_SESSION['e']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control form-control-border" name="email"
                                        placeholder="Nhập email">
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