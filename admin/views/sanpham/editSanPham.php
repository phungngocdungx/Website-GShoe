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
                    <h1>Sửa thông tin sản phẩm: <?= $sanPham['ten_san_pham'] ?></h1>
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
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                <label for="ten_san_pham">Tên sản phẩm</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control"
                                    value="<?= $sanPham['ten_san_pham'] ?>">
                                <?php if (isset($_SESSION['e']['ten_san_pham'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['ten_san_pham'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="gia_san_pham">Giá sản phẩm</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control"
                                    value="<?= $sanPham['gia_san_pham'] ?>">
                                <?php if (isset($_SESSION['e']['gia_san_pham'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['gia_san_pham'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control"
                                    value="<?= $sanPham['gia_khuyen_mai'] ?>">
                                <?php if (isset($_SESSION['e']['gia_khuyen_mai'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['gia_khuyen_mai'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="so_luong">Số lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control"
                                    value="<?= $sanPham['so_luong'] ?>">
                                <?php if (isset($_SESSION['e']['so_luong'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['so_luong'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="ngay_nhap">Ngày nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control"
                                    value="<?= $sanPham['ngay_nhap'] ?>">
                                <?php if (isset($_SESSION['e']['ngay_nhap'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['ngay_nhap'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục sản phẩm</label>
                                <select name="danh_muc_id" id="" class="form-control custom-select">
                                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                                        <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?>
                                            value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php if (isset($_SESSION['e']['danh_muc_id'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['danh_muc_id'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="trang_thai">Trạng thái sản phẩm </label>
                                <select name="trang_thai" id="trang_thai" class="form-control custom-select">
                                    <option style="color: green;" <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                                    <option style="color: red" <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán
                                    </option>
                                </select>
                                <?php if (isset($_SESSION['e']['trang_thai'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['e']['trang_thai'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả sản phẩm</label>
                                <textarea name="mo_ta" id="mo_ta" class="form-control custom-select"
                                    row="4"><?= $sanPham['mo_ta'] ?></textarea>
                            </div>
                            <div class="car-footer text-center">
                                <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <!-- /.card -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Album ảnh sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>File</th>
                                            <th><div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i> ADD NEW </button></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                        <input type="hidden" id="img_delete" name="img_delete">
                                        <?php foreach ($listAnhSanPham as $key => $value): ?>
                                            <tr id="faqs-row-<?= $key?>">
                                                <input type="hidden" name="current_img_ids[]" value="<?= $value['id']?>">
                                                <td>
                                                    <img src="<?= BASE_URL . $value['link_hinh_anh']?>" style="width:50px; height=50px;" alt="">
                                                </td>
                                                <td><input type="file" name="img_array[]" placeholder="File" class="form-control"></td>
                                                <td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow(<?= $key?>, <?= $value['id']?>)"><i
                                                            class="fa fa-trash"></i>
                                                        Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="car-footer text-center">
                        <button type="submit" class="btn btn-primary">Sửa thông tin ảnh</button>
                    </div>
                    </div>
                    <!-- /.card-body -->
                    
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="<?= BASE_URL_ADMIN.'?act=san-pham'?>" class="btn btn-secondary">Cancel</a>
                <!-- <input type="submit" value="Save Changes" class="btn btn-success float-right"> -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- <footer></footer> -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->
</body>
<script>
    var faqs_row = <?= count($listAnhSanPham); ?>;
    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShZpguM6lclFlATfoceBbXhDG7ENRjUjGK_g&s" style="width:50px; height=50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow('+ faqs_row +', null);"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }
    function removeRow(rowId, imgId){
        $('#faqs-row-' + rowId).remove();
        if(imgId !== null){
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>
</html>