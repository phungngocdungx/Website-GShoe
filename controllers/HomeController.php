<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        // $this->modelGioHang = new GioHang();
        // $this->modelGioHang = new GioHang();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;
            // require_once './views/cart.php';
        } 
        require_once './views/home.php';
    }
    public function chiTietSanPham()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamDanhMucId = $this->modelSanPham->sanPhamTheoDanhMuc($sanPham['danh_muc_id']);
        // var_dump($listSanPhamDanhMucId);die();
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
    public function formLogin()
    {
        require_once './views/auth/login.php';

        deleteSessionE();
    }
    public function formRegister()
    {
        require_once './views/auth/register.php';
        deleteSessionE();
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if (is_array($user) && isset($user['email'])) { // Nếu đăng nhập thành công, trả về mảng user
                // Lưu thông tin vào session
                $_SESSION['user-account'] = $user['email'];
                $_SESSION['user-role'] = $user['chuc_vu_id']; // Lưu chuc_vu_id
                header("Location:" . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['e'] = $user;
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user-account'])) {
            unset($_SESSION['user-account']);
            header("Location:" . BASE_URL);
        }
    }
    public function detailAccountKhachHang()
    {
        $email = $_SESSION['user-account'];
        $detailAccount = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
        require_once './views/auth/detail-account.php';
        deleteSessionE();
    }
    public function updateAccountKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['user-account'];

            // Lấy dữ liệu từ form
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];

            $old_pass = $_POST['old_pass'] ?? null;
            $new_pass = $_POST['new_pass'] ?? null;

            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($id);

            $e = [];
            $checkPass = false;

            // Kiểm tra mật khẩu nếu được nhập
            if ($old_pass) {
                if (password_verify($old_pass, $user['mat_khau']) || $old_pass === $user['mat_khau']) {
                    $checkPass = true;
                } else {
                    $e['old_pass'] = 'Mật khẩu cũ không đúng';
                }
            }

            // Xử lý lỗi nhập liệu
            if (empty($ho_ten)) $e['ho_ten'] = 'Tên tài khoản không được để trống';
            if (empty($email)) $e['email'] = 'Email không được để trống';
            if (empty($so_dien_thoai)) $e['so_dien_thoai'] = 'Số điện thoại không được để trống';
            if (empty($dia_chi)) $e['dia_chi'] = 'Địa chỉ không được để trống';
            if (empty($ngay_sinh)) $e['ngay_sinh'] = 'Ngày sinh không được để trống';

            // Nếu không có lỗi
            if (empty($e)) {
                // Nếu có mật khẩu mới, hash và cập nhật
                if ($checkPass && $new_pass) {
                    $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                    $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                }

                // Cập nhật các thông tin khác
                $data = [
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'dia_chi' => $dia_chi,
                    'ngay_sinh' => $ngay_sinh,
                    'gioi_tinh' => $gioi_tinh,
                ];
                $status = $this->modelTaiKhoan->updateAccount($user['id'], $data);

                if ($status) {
                    $_SESSION['success'] = "Cập nhật thông tin thành công";
                    header("Location:" . BASE_URL);
                    exit();
                }
            } else {
                $_SESSION['error'] = $e;
                header("Location:" . BASE_URL . '?act=detail-account-khach-hang');
                exit();
            }
        }
    }

    public function listProduct()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $SanPhamDanhMucId = $this->modelSanPham->sanPhamTheo($listDanhMuc['danh_muc_id']);
        require_once './views/listSanPham.php';
    }
    public function cart()
    {
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;
            require_once './views/cart.php';
        } else {
            var_dump('Loi chua dang nhap');
            die;
        }
        require_once './views/cart.php';
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user-account'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;
            require_once './views/thanhToan.php';
        } else {
            var_dump('Loi chua dang nhap');
            die;
        }
    }
    public function addGiohang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user-account'])) {
                $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

                $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                // var_dump($chiTietGioHang);die;
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong); // Fixed here
                }
                // var_dump('thanh cong');
                header("Location:" . BASE_URL . '?act=gio-hang');
                die;
            } else {
                var_dump('Loi chua dang nhap');
                die;
            }
        }
    }
}
