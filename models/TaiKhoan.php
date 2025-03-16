<?php
class TaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM `tai_khoans` WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            // So sánh mật khẩu với giá trị đã băm
            if ($user && (password_verify($mat_khau, $user['mat_khau']) || $user['mat_khau'] === $mat_khau)) {
                if ($user['chuc_vu_id'] == 1 || $user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) { // Thành công
                        return $user; // Trả về toàn bộ thông tin user
                    } else {
                        return "Tài khoản bị cấm.";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập.";
                }
            } else {
                return "Thông tin email và password không đúng.";
            }
        } catch (Exception $e) {
            return "Lỗi: " . $e->getMessage();
        }
    }

    public function getTaiKhoanFormEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function resetPassword($id, $mat_khau)
    {
        try {
            // var_dump($id); die;
            $sql = 'UPDATE tai_khoans
                SET
                mat_khau = :mat_khau
                WHERE id= :id';
            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt); die;
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function updateAccount($id, $data)
    {
        $sql = "UPDATE tai_khoans
            SET ho_ten = :ho_ten, 
                email = :email, 
                so_dien_thoai = :so_dien_thoai, 
                dia_chi = :dia_chi, 
                ngay_sinh = :ngay_sinh, 
                gioi_tinh = :gioi_tinh 
            WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ho_ten', $data['ho_ten']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':so_dien_thoai', $data['so_dien_thoai']);
        $stmt->bindParam(':dia_chi', $data['dia_chi']);
        $stmt->bindParam(':ngay_sinh', $data['ngay_sinh']);
        $stmt->bindParam(':gioi_tinh', $data['gioi_tinh']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
