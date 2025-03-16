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
                    <h1>Create New Product</h1>
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
                            <h4 class="card-title">Thêm sản phẩm</h4>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body row">

                                <div class="form-group col-12">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control form-control-border" name="ten_san_pham" value="<?= isset($_SESSION['old']['ten_san_pham']) ? $_SESSION['old']['ten_san_pham'] : '' ?>" placeholder="Nhập tên sản phẩm">
                                    <?php if (isset($_SESSION['e']['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" class="form-control form-control-border" name="gia_san_pham" value="<?= isset($_SESSION['old']['gia_san_pham']) ? $_SESSION['old']['gia_san_pham'] : '' ?>" placeholder="Nhập giá sản phẩm">
                                    <?php if (isset($_SESSION['e']['gia_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['gia_san_pham'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Giá khuyến mãi</label>
                                    <input type="number" class="form-control form-control-border" name="gia_khuyen_mai" value="<?= isset($_SESSION['old']['gia_khuyen_mai']) ? $_SESSION['old']['gia_khuyen_mai'] : '' ?>" placeholder="Nhập giá khuyến mãi">
                                    <?php if (isset($_SESSION['e']['gia_khuyen_mai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['gia_khuyen_mai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control form-control-border" name="so_luong" value="<?= isset($_SESSION['old']['so_luong']) ? $_SESSION['old']['so_luong'] : '' ?>" placeholder="Nhập số lượng">
                                    <?php if (isset($_SESSION['e']['so_luong'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['so_luong'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày nhập</label>
                                    <input type="date" class="form-control form-control-border" name="ngay_nhap" value="<?= isset($_SESSION['old']['ngay_nhap']) ? $_SESSION['old']['ngay_nhap'] : '' ?>" placeholder="Nhập ngày đăng sản phẩm">
                                    <?php if (isset($_SESSION['e']['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="danh_muc_id">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php foreach ($listDanhMuuc as $danhMuc): ?>
                                            <option value="<?= $danhMuc['id'] ?>" <?= isset($_SESSION['old']['danh_muc_id']) && $_SESSION['old']['danh_muc_id'] == $danhMuc['id'] ? 'selected' : '' ?>>
                                                <?= $danhMuc['ten_danh_muc'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($_SESSION['e']['danh_muc_id'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['danh_muc_id'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                        <option selected disabled>Chọn trạng thái sản phẩm</option>
                                        <option value="1" <?= isset($_SESSION['old']['trang_thai']) && $_SESSION['old']['trang_thai'] == '1' ? 'selected' : '' ?>>Còn bán</option>
                                        <option value="0" <?= isset($_SESSION['old']['trang_thai']) && $_SESSION['old']['trang_thai'] == '0' ? 'selected' : '' ?>>Dừng bán</option>
                                    </select>
                                    <?php if (isset($_SESSION['e']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['e']['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>


                                <div class="form-group col-12">
                                    <label>Mô tả</label>
                                    <input type="text" class="form-control form-control-border" name="mo_ta" value="<?= isset($_SESSION['old']['mo_ta']) ? $_SESSION['old']['mo_ta'] : '' ?>" placeholder="Nhập mô tả sản phẩm">
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