<?php 
// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
define('BASE_URL'       , 'http://localhost/Shop_GShoe/');
define('BASE_URL_ADMIN'       , 'http://localhost/Shop_GShoe/admin/'); // Đường dẫn vào phần admin
define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'xuong_db_wedsite-thu-cung');  // Tên database
define('PATH_ROOT'    , __DIR__ . '/../');