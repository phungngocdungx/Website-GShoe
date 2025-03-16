<?php
class AdminDonHangControllers
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        // echo "Đây là trang danh mục";
        require_once './views/donhang/listDonHang.php';
    }
    public function detailDonHang()
    {
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id); // lấy thông tin đơn hàng ở bảng đơn hàng
        $getlistDonHang = $this->modelDonHang->getListDonHang($id); // lấy danh sách sản phẩm từ bảng chi_tiet_don_hangs
        $trangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang(); // lấy trạng thái đon hàng
        // $updateTrangThaiDonHang = $this->modelDonHang->updateTrangThaiDonHang($id);
        // var_dump($listDonHang);die();
        require_once './views/donhang/detailDonHang.php';
    }
    public function formEditDonHang()
    {
        // hàm này dùng để hiển thị form sản phẩm
        // lấy ra thông tin sản phẩm cần sủa
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);

        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionE();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }
    public function postEditDonHang() // chỉ sửa trạng thái đơn hàng
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $don_hang_id = $_POST['don_hang_id'] ?? ''; // lấy id đơn hàng
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            // $trang_thai_id = $_POST['trang_thai_id'] ?? ''; // lấy id trạng thái đơn hàng

            $e = [];
            if (empty($ten_nguoi_nhan)) {
                $e['ten_nguoi_nhan'] = 'Tên người dùng không được để trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $e['sdt_nguoi_nhan'] = 'Sdt không được để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $e['email_nguoi_nhan'] = 'Email không được để trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $e['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
            }
            
            $_SESSION['e'] = $e;
            
            if (empty($e)) {
                $this->modelDonHang->updateDonHang($don_hang_id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu);
                // var_dump($abc);die;
                header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
            
        }
    }
    public function print()
    {
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id); // lấy thông tin đơn hàng ở bảng đơn hàng
        $getlistDonHang = $this->modelDonHang->getListDonHang($id); // lấy danh sách sản phẩm từ bảng chi_tiet_don_hangs
        $trangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang(); // lấy trạng thái đon hàng
        require_once './views/donhang/printDonHang.php';
    }
    public function deleteDonHang()
    {
        //         $id = $_GET['id_san_pham'];
        //         $sanPham = $this->modelSanPham->getDetailSanPham($id); 
        //         $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        //         if ($sanPham) {
        //             deleteFile($sanPham['hinh_anh']);
        //             $this->modelSanPham->destroySanPham($id);
        //         }
        //         if($listAnhSanPham){
        //             foreach($listAnhSanPham as $key=>$anhSp){
        //                 deleteFile($anhSp['link_hinh_anh']);
        //                 $this->modelSanPham->destroyAnhSanPham($anhSp['id']);
        //             }
        //         }
        //         header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        //         exit();
    }
}
