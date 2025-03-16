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
                    <h1>Quản lý danh mục sản phẩm</h1>
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
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN .  '?act=form-them-danh-muc'?>">
                                <button class="btn btn-success">Thêm danh mục</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($listDanhMuc as $key=>$danhMuc): ?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><?= $danhMuc['ten_danh_muc'] ?></td>
                                        <td><?= $danhMuc['mo_ta'] ?></td>
                                        <td>
                                            <a href="<?= BASE_URL_ADMIN .  '?act=form-sua-danh-muc&id_danh_muc='.$danhMuc['id']?>"><button class="btn btn-warning">Sửa</button></a>
                                            <a href="<?= BASE_URL_ADMIN .  '?act=xoa-danh-muc&id_danh_muc='.$danhMuc['id']?>"><button class="btn btn-danger" onclick="return confirm('Xác Nhận Xóa Vĩnh Viễn Danh Mục.')">Xóa</button></a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
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
<?php include './views/layout/footer.php';?>
<!-- end footer -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            
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