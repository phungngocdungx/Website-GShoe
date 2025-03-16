<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
// Route
$act = $_GET['act'] ?? '/';
match ($act) {
    
    // Trang chủ
    '/' => (new HomeController())->home(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    // auth
    'login-register' => (new HomeController())->formRegister(),
    'check-login-register' =>(new HomeController())->postLogin(),
    'logout' =>(new HomeController())->logout(),
    'detail-account-khach-hang' => (new HomeController())->detailAccountKhachHang(),
    'list-product' => (new HomeController())->listProduct(),
};