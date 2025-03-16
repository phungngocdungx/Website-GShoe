<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>In thông tin đơn hàng</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        Thông tin - Đơn hàng <b style="color:gray"><?= $donHang['ma_don_hang'] ?></b>
                        <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']); ?></small>
                    </h2>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>