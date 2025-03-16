<?php
class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        // echo "Đây là trang danh mục";
        require_once './views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        $listDanhMuuc = $this->modelDanhMuc->getAllDanhMuc();
        // hàm này dùng để hiển thị form danh mục
        require_once './views/sanpham/addSanPham.php';
        deleteSessionE(); // hàm  này dùng để xóa session sau khi load trang
    }
    public function postAddSanPham()
    {
        // hàm này dùng để thêm dữ liệu
        // kiểm tra xem dữ liệu có phải được submit từ form lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null; // hình ảnh
            // Lưu ảnh vào 
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            $img_array = $_FILES['img_array']; // album hình ảnh
            $e = []; // tạo một mảng trống để chứa dữ lệu.
            if (empty($ten_san_pham)) {
                $e['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $e['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $e['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $e['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $e['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $e['danh_muc_id'] = 'Danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $e['trang_thai'] = 'Trạng thái sản phẩm phải chọn';
            }
            // if ($hinh_anh['e'] !== 0) {
            //     $e['hinh_anh'] = 'Phải chọn hình ảnh sản phẩm.';
            // }
            $_SESSION['e'] = $e;
            $_SESSION['old'] = $_POST; // lưu giá trị ng dùng vừa nhập ở input, nếu ng dùng nhập sai giá trị của ng dùng vẫn sec giữ nguyên
            // nếu không có lỗi thì tiến hành thêm sản phẩm
            if (empty($e)) {
                // nếu không có lỗi tiến hành thêm sản phẩm
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);
                // var_dump($san_pham_id); die();
                // xử lý thêm album ảnh sane phẩm img_array
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'e' => $img_array['e'][$key],
                            'size' => $img_array['size'][$key],
                        ];
                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // trả về form và lỗi.
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formEditSanPham()
    {
        // hàm này dùng để hiển thị form sản phẩm
        // lấy ra thông tin sản phẩm cần sủa
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionE();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function postEditSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $sanPhamOlad = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOlad['hinh_anh'];
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            $e = [];
            if (empty($ten_san_pham)) {
                $e['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $e['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $e['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $e['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $e['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $e['danh_muc_id'] = 'Danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $e['trang_thai'] = 'Trạng thái sản phẩm phải chọn';
            }
            $_SESSION['e'] = $e;

            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './uploads/');
                if ($new_file && !empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            if (empty($e)) {
                $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }
    //sửa Allbum ảnh
    // - sửa ảnh cũ
    //    + Thêm ảnh mới
    //    + khôn thêm ảnh mới
    // - không sửa ảnh
    //    + Thêm ảnh mới
    //    + Không thêm ảnh mới
    // - Xóa ảnh cũ
    //    + Thêm ảnh mới
    //    + Không thêm ảnh mới
    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // lấy danh sách ảnh hiện tại của sản phẩm
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
            // Xử lý ảnh được gửi từ form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];
            // khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
            $upload_file = [];
            // upload ảnh mới hoặc thay thế ảnh cũ
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) { // Sửa lỗi từ 'e' thành 'error'
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }
            // lưu ảnh mới vào db và xóa ảnh cũ
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

                    // cập nhật ảnh cũ
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    // xóa ảnh cũ
                    deleteFile($old_file);
                } else {
                    // thêm ảnh mới
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }
            // Xử lý xóa ảnh
            foreach ($listAnhSanPhamCurrent as $anhSp) {
                $anh_id = $anhSp['id'];
                if (in_array($anh_id, $img_delete)) {
                    // xóa ảnh trong db
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
                    // xóa file 
                    deleteFile($anhSp['link_hinh_anh']);
                }
            }
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }

    // .......................................................
    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        if ($sanPham) {
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $anhSp) {
                deleteFile($anhSp['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSp['id']);
            }
        }
        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }
    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        if ($sanPham) {
            require_once './views/sanpham/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function updateTrangThaiBinhluan()
    {
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);
        if ($binhLuan) {
            $trang_thai_update = '';
            if ($binhLuan['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status = $this->modelSanPham->updateTrangThaiBinhluan($id_binh_luan, $trang_thai_update);
            if ($status) {
                if ($name_view == 'detail_khach') {
                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' .  $binhLuan['tai_khoan_id']);
                }else{
                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
                }
            }
        }
    }
}
