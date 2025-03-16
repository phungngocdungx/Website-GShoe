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
                    <h1>Quản lý tài khoản khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKhachHang as $key => $khachHang) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $khachHang['ho_ten'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width:100px" alt=""
                                                onerror="this.onerror=null; this.src='https://png.pngtree.com/png-vector/20190623/ourlarge/pngtree-accountavataruser--flat-color-icon--vector-icon-banner-templ-png-image_1491720.jpg'"> <!-- nếu tài khôanr không tồn tại ânhr sẽ lấy link ảnh làm ảnh tại thời -->
                                            </td>
                                            <td><?= $khachHang['email'] ?></td>
                                            <td><?= $khachHang['so_dien_thoai'] ?></td>
                                            <td>
                                                <?= $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động'?>
                                            </td>
                                            <td>
                                                <div class="btn-group" style="gap: 5px">
                                                    <a href="<?= BASE_URL_ADMIN .  '?act=chi-tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>"><button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                                                    <a href="<?= BASE_URL_ADMIN .  '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['id'] ?>"><button class="btn btn-warning"><i class="far fa-edit"></i></button></a>
                                                    <a href="#"><button class="btn btn-danger" onclick="return confirm('Xác Nhận Xóa Vĩnh Viễn Danh Mục.')">RESET PASSWORD</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
<!-- Code injected by live-server -->
</body>

</html>



Chưa xác nhận 1


Đã xác nhân 2


Chưa thanh toán 3


Đã thanh toán 4


Đang chuẩn bị hàng 5


Đang giao 6


Đã giao 7


Đã nhận 8


Thành công 9


Hoàn hàng -- 10


Hủy đơn -- 11




warning -- vàng   1, 3 5 

primary -- xanh dương 2 4 6 7 8 

success -- xanh lá 9

danger -- đỏ 10 11