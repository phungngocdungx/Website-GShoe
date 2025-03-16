<?php include './views/layout/header.php'; ?><!-- header -->
<?php include './views/layout/navbar.php'; ?><!-- navbar -->
<?php include './views/layout/sidebar.php'; ?><!-- sidebar -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1>Quản lý đơn hàng - Đơn hàng <b style="color:gray"><?= $donHang['ma_don_hang'] ?></b></h1>
        </div>
        <div class="col-sm-4">
          <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST" style="display: flex; gap: 10px;">
            <input type="hidden" name="don_hang_id" value="<?= $donHang['id']; ?>" /> <!-- bắn lại id đơn hàng  -->
            <select class="form-control" name="trang_thai_id">
              <?php foreach ($trangThaiDonHang as $key => $trangThai): ?>
                <option
                  <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' // hiện thị trạng thái của đơn hàng
                  ?>
                  <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : '' // nếu trang thái đã xác nhận từ trước se không cho xác nhận lại nữa
                  ?>
                  value="<?= $trangThai['id']; ?>"><?= $trangThai['ten_trang_thai']; ?>
                </option>
              <?php endforeach ?>
            </select>
            <button class="btn btn-primary" type="submit" name="submit">Lưu</button>
          </form>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>">Home</a></li>
            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="check-circle-fill" viewBox="30 -27 70 70">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" viewBox="0 -27 70 70">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" viewBox="0 -27 70 70">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
          </svg>
          <!-- warning -- vàng 1, 3 5

              primary -- xanh dương 2 4 6 7 8

              success -- xanh lá 9

              danger -- đỏ 10 11 -->
          <?php if (in_array($donHang['trang_thai_id'], [1, 3, 5])) {
            $colorAlerts = 'warning';
            $iconI = 'fas fa-spinner';
          } elseif (in_array($donHang['trang_thai_id'], [2, 4, 6, 7, 8])) {
            $colorAlerts = 'primary';
            $iconSvg = 'check-circle-fill';
          } elseif ($donHang['trang_thai_id'] == 9) {
            $colorAlerts = 'success';
            $iconSvg = 'check-circle-fill';
          } else {
            $colorAlerts = 'danger';
            $iconSvg = 'exclamation-triangle-fill';
          } ?>
          <div class="alert alert-<?= $colorAlerts; ?> d-flex align-items-center" style="height: 58px;">
            <?php
            if (isset($iconSvg)) { ?>
              <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                <use xlink:href="#<?= $iconSvg; ?>" />
              </svg>
            <?php } elseif (isset($iconI)) { ?>
              <i class="<?= $iconI ?>"></i>
            <?php } ?>
            <h5>Trạng thái đơn hàng: <?= $donHang['ten_trang_thai'] ?></h5>
          </div>
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-dog"></i> PetPalace.
                  <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']); ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Nơi gửi
                <address>
                  <strong>PetPalace.</strong><br>
                  Số 13, đường Trịnh Văn Bô, Hà Nội<br>
                  Phone: +84 987 654 321<br>
                  Email: PetPalace@gmail.com
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Nơi nhận
                <address>
                  <strong><?= $donHang['ten_nguoi_nhan']; ?></strong><br>
                  <?= $donHang['dia_chi_nguoi_nhan']; ?><br>
                  Phone: <?= $donHang['sdt_nguoi_nhan']; ?><br>
                  Email: <?= $donHang['email_nguoi_nhan']; ?>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Người đặt:
                <address>
                  <strong><?= $donHang['ho_ten']; ?></strong><br>
                  <?= $donHang['dia_chi']; ?><br>
                  Phone: <?= $donHang['so_dien_thoai']; ?><br>
                  Email: <?= $donHang['email']; ?><br>
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Mã đơn hàng</th>
                      <th>Số lượng</th>
                      <th>Ghi chú</th>
                      <th>Đơn giá</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $tong_tien = 0; ?>
                    <?php foreach ($getlistDonHang as $key => $detailDonHang): ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $detailDonHang['ten_san_pham'] ?></td>
                        <td><?= $detailDonHang['ma_don_hang'] ?></td>
                        <td><?= $detailDonHang['so_luong'] ?></td>
                        <td><?= $detailDonHang['ghi_chu'] ?></td>
                        <td><?= formatPrice($detailDonHang['don_gia']) . ' VND' ?></td>
                        <td><?= formatPrice($detailDonHang['thanh_tien']) . ' VND' ?></td>
                      </tr>
                      <?php $tong_tien += $detailDonHang['thanh_tien']; ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- Phương thức thanh toán -->
              <div class="col-6">
                <p class="lead">Phương thức thanh toán:</p>
                <?php if ($donHang['phuong_thuc_thanh_toan_id'] == 1) { ?>
                  <?= $donHang['ten_phuong_thuc'] . ':'; ?><br>
                  <img style="height: 88px; width: 51px;" src="./assets/dist/img/credit/COD.webp" alt="Paypal"><br>
                <?php } else { ?>
                  <?= $donHang['ten_phuong_thuc'] . ':'; ?><br>
                  <img src="./assets/dist/img/credit/visa.png" alt="Visa">
                  <img src="./assets/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="./assets/dist/img/credit/american-express.png" alt="American Express">
                  <img src="./assets/dist/img/credit/paypal2.png" alt="Paypal">
                <?php } ?>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Thanh toán</p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Tổng tiền hàng:</th>
                      <td><?= formatPrice($tong_tien) . ' VND' ?></td>
                    </tr>
                    <tr>
                      <th>Phí ship(1%):</th> <?php $ship = 0.01;
                                              $shipping = $tong_tien * $ship;
                                              ?>
                      <td><?= formatPrice($shipping) ?></td>
                    </tr>
                    <tr>
                      <th>Tổng thanh toán:</th>
                      <td><?= formatPrice($tong_tien + $shipping) ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="<?= BASE_URL_ADMIN . '?act=print&id_don_hang=' . $donHang['id'] ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- Page specific script -->

<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->