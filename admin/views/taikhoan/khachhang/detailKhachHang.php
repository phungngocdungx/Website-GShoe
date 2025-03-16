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
                <div class="col-4">
                    <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width:70%" alt="" onerror="this.onerror=null; this.src='https://png.pngtree.com/png-vector/20190623/ourlarge/pngtree-accountavataruser--flat-color-icon--vector-icon-banner-templ-png-image_1491720.jpg'">
                </div>
                <div class="col-8">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Họ tên: </th>
                                    <th><?= $khachHang['ho_ten'] ?? '' ?></th>
                                </tr>
                                <tr>
                                    <th>Ngày sinh: </th>
                                    <th><?= $khachHang['ngay_sinh'] ?? '' ?></th>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <th><?= $khachHang['email'] ?? '' ?></th>
                                </tr>
                                <tr>
                                    <th>Số điện thoại: </th>
                                    <th><?= $khachHang['so_dien_thoai'] ?? '' ?></th>
                                </tr>
                                <tr>
                                    <th>Giới tính: </th>
                                    <th><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'  ?? '' ?></th>
                                </tr>
                                <tr>
                                    <th>Địa chỉ: </th>
                                    <th><?= $khachHang['dia_chi'] ?? '' ?></th>
                                </tr>
                                <tr>
                                    <th>Trạng thái: </th>
                                    <th>
                                        <?= $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động'  ?? '' ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Vai trò: </th>
                                    <th><?= $khachHang['chuc_vu_id'] == 1 ? 'Admin' : 'Khách hàng'  ?? '' ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <h4>Thông tin đơn hàng</h4>
                </div>
                <div class="col-12">
                    <h4>Lịch sử bình luận</h4>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                                        <td><?= $binhLuan['noi_dung'] ?></td>
                                        <td><?= $binhLuan['ngay_dang'] ?></td>
                                        <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                                        <td>
                                            <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="POST">
                                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                <input type="hidden" name="name_view" value="detail_khach">
                                                <button class="btn btn-danger" onclick="return confirm('Xác Nhận Ẩn Bình Luận.')"><?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ Ẩn' ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </tfoot>
                        </table>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>