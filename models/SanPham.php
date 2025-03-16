<?php
class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // viết hàm lấy toàn bộ sản phẩm
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getAllDanhMuc()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien	
            FROM binh_luans 
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id 
            WHERE binh_luans.san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function sanPhamTheoDanhMuc($danh_muc_id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id =' . $danh_muc_id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function top10SanPham()
    {
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY luot_xem DESC LIMIT 10';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function sanPhamTheo($id)
    {
        try {
            $sql = 'SELECT danh_mucs.*, san_phams.ten_san_pham 
                FROM danh_mucs
                INNER JOIN san_phams ON danh_mucs.id = san_phams.danh_muc_id
                WHERE danh_mucs.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
