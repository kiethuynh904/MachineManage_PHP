<?php
require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";

/**
 * @desc Class này giúp người dùng nhập xuất, tính tổng giá và khối lượng chi tiết phức
 * @author kiethuynh0904@gmail.com
 * @require ChiTietDon.php và ChiTietPhuc.php
 */
class May
{
    /**
     * @type string
     */
    private $maMay;
    /**
     * @type string
     */
    private $tenMay;
    /**
     * @type number
     */
    private $soLuongChiTietMay;
    /**
     * @type array
     */
    private $dsChiTietMay = [];
    /**
     * @type number
     */
    private $loaiChiTietMay;

    /**
     * @desc Hàm nhập danh sách chi tiết máy
     * @input Số lượng chi tiết máy, loại chi tiết máy
     * @output Danh sách chi tiết máy
     * @validate
     */
    public function nhap()
    {
        do {
            $this->tenMay = readline("Nhập Tên Máy:");
            if (empty(trim($this->tenMay))) {
                echo "Tên máy không được bỏ trống, vui lòng nhập lại \n";
            }
        } while (empty(trim($this->tenMay, " ")));
        do {
            $this->maMay = readline("Nhập Mã Máy:");
            if (empty(trim($this->maMay))) {
                echo "Mã máy không được bỏ trống, vui lòng nhập lại \n";
            }
        } while (empty(trim($this->maMay, " ")));
        do {
            $this->soLuongChiTietMay = readline("Có Bao Nhiêu Chi Tiết Máy:");
            if (!is_numeric($this->soLuongChiTietMay)) {
                echo "Số lượng chi tiết máy phải là số, xin vui lòng thử lại \n";
            } elseif ($this->soLuongChiTietMay < 0) {
                echo "Số lượng chi tiết máy không được là số âm, xin vui lòng thử lại \n";
            } elseif (!is_int($this->soLuongChiTietMay * 1)($this->soLuongChiTietMay)) {
                echo "Số lượng chi tiết máy không được là số thập phân, xin vui lòng thử lại";
            }
        } while (!is_numeric($this->soLuongChiTietMay) || $this->soLuongChiTietMay < 0 || !is_int($this->soLuongChiTietMay * 1));
        for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
            do {
                $this->loaiChiTietMay = readline("Chi Tiết Đơn => Nhập 1 || Chi Tiết Phức => Nhập 2 :");
                if ($this->loaiChiTietMay != 1 && $this->loaiChiTietMay != 2 || !is_numeric($this->loaiChiTietMay)) {
                    echo "Vui lòng chỉ chọn 1 hoặc 2 \n";
                }
            } while ($this->loaiChiTietMay != 1 && $this->loaiChiTietMay != 2 || !is_numeric($this->loaiChiTietMay));
            if ($this->loaiChiTietMay == 1 || $this->loaiChiTietMay == 2) {
                $chiTiet = null;
                if ($this->loaiChiTietMay == 1) {
                    $chiTiet = new ChiTietDon();

                } else {
                    $chiTiet = new ChiTietPhuc();
                }
                $chiTiet->nhap();
                $this->dsChiTietMay[] = $chiTiet;
            }
        }

    }

    /**
     * @desc: Hàm xuất thông tin chi tiết máy
     * @output Thông tin chi tiết máy
     */
    public function xuatMay()
    {
        echo "Tên Máy :" . $this->tenMay . "\n";
        echo "Mã Máy :" . $this->maMay . "\n";
        echo "Danh Sách Chi Tiết :\n";
        echo "Giá Của Máy Là:" . $this->tinhTien() . "\n";
        echo "Khối Lượng Của Máy Là:" . $this->tinhKhoiLuong() . "\n";
        for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
            print_r($this->dsChiTietMay[$i]);
        }
    }

    /**
     * @desc: Hàm tinh tổng tiền chi tiết máy
     * @input: Giá tiền của từng các chi tiết con có trong máy
     * @return number : tổng tiền chi tiết máy
     */
    public function tinhTien()
    {
        $tongTien = 0;
        for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
            $tongTien += $this->dsChiTietMay[$i]->tinhTien();
        }
        return $tongTien;
    }

    /**
     * @desc: Hàm tinh tổng khối lượng chi tiết máy
     * @input: Khối lượng của từng các chi tiết con có trong máy
     * @return number : Tổng khối lượng chi tiết máy
     */
    public function tinhKhoiLuong()
    {
        $tongKhoiLuong = 0;
        for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
            $tongKhoiLuong += $this->dsChiTietMay[$i]->tinhKhoiLuong();
        }
        return $tongKhoiLuong;
    }
}


