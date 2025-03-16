<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
// Require toàn bộ file Controllers
require_once './controllers/AdminDanhmucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangControllers.php';

require_once './controllers/AdminTaiKhoanController.php';
// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';
// Route
$act = $_GET['act'] ?? '/';
if($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin'){
    checkLoginAdmin();
}
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
    // Route báo cáo - trang chủ
    '/' => (new AdminDanhMucController())->danhSachDanhMuc(),
    // Route danh muc
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(), 
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(), 
    
    // Route sản phẩm
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(), 
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(), 
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),

    // Route bình luận
    'update-trang-thai-binh-luan' => (new AdminSanPhamController())->updateTrangThaiBinhluan(),

    // Route quản lý đơn hàng
    'don-hang' => (new AdminDonHangControllers())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangControllers())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangControllers())->postEditDonHang(), 
    'chi-tiet-don-hang' => (new AdminDonHangControllers())->detailDonHang(),
    'print' => (new AdminDonHangControllers())->print(),
    
    // Route quản lý tài khoản
        // quản lý tài khoản quản trị
        'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->danhSachQuanTri(),
        'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
        'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
        'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
        'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),
        // route reset password tài khoản khách hàng
        
        // quản lý tài khoản khách hàng
        'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->danhSachKhachHang(),
        'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
        'sua-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
        'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->detailKhachHang(),

        // route quản lý tài khoản cá nhân ( tài khoản quản trị)
        'form-sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->formEditCaNhanQuanTri(),
        'sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditCaNhanQuanTri(),
        'sua-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditMatKhauCaNhan(),    
    // route auth
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),
};