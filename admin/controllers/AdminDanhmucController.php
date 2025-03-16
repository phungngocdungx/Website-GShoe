<?php
class AdminDanhmucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        // echo "Đây là trang danh mục";
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc()
    {
        // hàm này dùng để hiển thị form danh mục
        require_once './views/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc()
    {
        // hàm này dùng để thêm dữ liệu
        // kiểm tra xem dữ liệu có phải được submit từ form lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $e = []; // tạo một mảng trống để chứa dữ lệu.
            $_SESSION['old'] = $_POST; // lưu giá trị ng dùng vừa nhập ở input, nếu ng dùng nhập sai giá trị của ng dùng vẫn sec giữ nguyên
            if (empty($ten_danh_muc)) {
                $e['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            // nếu không có lỗi thì tiến hành thêm danh mục
            if (empty($e)) {
                // nếu không có lỗi tiến hành thêm danh mục
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // trả về form và lỗi.
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }

    }
    
    public function formEditDanhMuc()
    {
        // hàm này dùng để hiển thị form danh mục
        // lấy ra thông tin danh mục cần sủa
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }

    }
    public function postEditDanhMuc()
    {
        // hàm này dùng để sửa dữ liệu
        // kiểm tra xem dữ liệu có phải được submit từ form lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $e = []; // tạo một mảng trống để chứa dữ lệu.
            if (empty($ten_danh_muc)) {
                $e['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            // nếu không có lỗi thì tiến hành sửa danh mục
            if (empty($e)) {
                // nếu không có lỗi tiến hành sửa danh mục
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // trả về form và lỗi.
                $danhMuc = ['id' => $id, 'ten_danhMuc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }

    }
    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
            
        }
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}
?>