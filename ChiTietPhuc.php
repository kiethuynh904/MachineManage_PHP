<?php
require_once "ChiTietDon.php";
require_once "ChiTietMay.php";

/**
 * @desc Class này giúp người dùng nhập xuất, tính tổng giá và khối lượng chi tiết phức
 * @author kiethuynh0904@gmail.com
 * @extend Chi Tiết Máy
 */
class ChiTietPhuc extends ChiTietMay
{
    /**
     * @type number
     */
    private $soLuongChiTietCon;
    /**
     * @type array
     */
    private $dsChiTietCon = [];
    /**
     * @type string
     */
    private $loaiChiTiet;

    /**
     * @desc Hàm nhập danh sách chi tiết con có trong chi tiết phức
     * @input Số lượng chi tiết con, loại chi tiết con
     * @output Danh sách chi tiết con
     * @validate
     */
    public function nhap()
    {
        parent::nhap(); // TODO: Change the autogenerated stub
        do {
            $this->soLuongChiTietCon = readline("Có Bao Nhiêu Chi Tiết Con:");
            if (!is_numeric($this->soLuongChiTietCon)) {
                echo "Số lượng chi tiết con phải là số, vui lòng thử lại \n";
            } elseif ($this->soLuongChiTietCon < 0) {
                echo "Số lượng chi tiết con không được âm, vui lòng thử lại \n";
            } elseif (!is_int($this->soLuongChiTietCon * 1)) {
                echo "Số lượng chi tiết không được là số thập phân, vui lòng thử lại \n";
            }
        } while (!is_numeric($this->soLuongChiTietCon) || $this->soLuongChiTietCon < 0 || !is_int($this->soLuongChiTietCon * 1));
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            do {
                $this->loaiChiTiet = readline("Chi Tiết Đơn => Nhập 1 || Chi Tiết Phức => Nhập 2 :");
                if ($this->loaiChiTiet != 1 && $this->loaiChiTiet != 2) {
                    echo "Vui lòng chỉ chọn 1 hoặc 2 \n";
                }
            } while ($this->loaiChiTiet != 1 && $this->loaiChiTiet != 2);
            $chiTiet = null;
            if ($this->loaiChiTiet == 1) {
                $chiTiet = new ChiTietDon();
            } else {
                $chiTiet = new ChiTietPhuc();
            }
            $chiTiet->nhap();
            $this->dsChiTietCon[] = $chiTiet;
        }
    }

    /**
     * @desc Hàm xuất thông tin chi tiết phức
     * @output Thông tin chi tiết phức
     */
    public function xuat()
    {
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            echo "Thông Tin Chi Tiết Phức Thứ " . ($i + 1) . "\n";
            print_r($this->dsChiTietCon[$i]);
        }
    }

    /**
     * @desc: Hàm tinh tổng tiền chi tiết phức
     * @input: Giá tiền của các chi tiết con
     * @return number : tổng tiền chi tiết phức
     */
    public function tinhTien()
    {
        $tongTien = 0;
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            $tongTien += $this->dsChiTietCon[$i]->tinhTien();
        }
        return $tongTien;
    }

    /**
     * @desc: Hàm tinh tổng khối lượng chi tiết phức
     * @input: Khối lượng của các chi tiết con
     * @return number : tổng khối lượng chi tiết phức
     */
    public function tinhKhoiLuong()
    {
        $tongKhoiLuong = 0;
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            $tongKhoiLuong += $this->dsChiTietCon[$i]->tinhKhoiLuong();
        }
        return $tongKhoiLuong;
    }
}
