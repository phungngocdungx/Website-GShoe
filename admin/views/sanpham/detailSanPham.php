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
          <h1>Chi tiết sản phẩm</h1>
        </div>
        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div> -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <!-- <h3 class="d-inline-block d-sm-none">Tên sản phẩm</h3> -->
            <div class="col-12">
              <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
            </div>
            <div class="col-12 product-image-thumbs">
              <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                <div class="product-image-thumb"><img src="<?= BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
              <?php endforeach ?>
              <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3"><?= $sanPham['ten_san_pham'] ?></h3><!-- Tên sản phẩm -->
            <p><?= $sanPham['mo_ta'] ?></p>
            <!-- Mô tả sản phẩm -->
            <hr>
            <div class="bg-gray py-2 px-3 mt-4">
              <h2 class="mb-0"> <?= $sanPham['gia_san_pham']; ?> </h2>
              <h3 class="mt-0"><small>Giá khuyến mãi: <?= $sanPham['gia_khuyen_mai']; ?></small></h3>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
              <h5 class="mt-3">MSP: <small><?= $sanPham['id'] ?></small></h5>
              <h5 class="mt-3">Số lượng: <small><?= $sanPham['so_luong'] ?></small></h5>
              <h5 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem'] ?></small></h5>
              <h5 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small></h5>
              <h5 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small></h5>
              <h5 class="mt-3">Trạng thái: <small><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></small></h5>
              <h5 class="mt-3">Mô tả: <small><?= $sanPham['mo_ta'] ?></small></h5>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận</a>

            </div>
          </nav>
          <div class="col-12">
            <h4>Bình luận của sản phẩm</h4>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Người bình luận</th>
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
                      <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?></a></td>
                      <td><?= $binhLuan['noi_dung'] ?></td>
                      <td><?= $binhLuan['ngay_dang'] ?></td>
                      <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                      <td>
                        <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="POST">
                          <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                          <input type="hidden" name="name_view" value="detail_sanpham">
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
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
<!-- Code injected by live-server -->
</body>

</html>