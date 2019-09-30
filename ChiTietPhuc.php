<?php
require_once "ChiTietDon.php";
require_once "ChiTietMay.php";

class ChiTietPhuc extends ChiTietMay
{
    private $soLuongChiTietCon;
    private $dsChiTietCon = [];
    private $loaiChiTiet;

    public function nhap()
    {
        parent::nhap(); // TODO: Change the autogenerated stub
        do {
            $this->soLuongChiTietCon = readline("Có Bao Nhiêu Chi Tiết Con:");
            if (!is_numeric($this->soLuongChiTietCon)) {
                echo "Số lượng chi tiết con phải là số, vui lòng thử lại \n";
            } elseif ($this->soLuongChiTietCon < 0) {
                echo "Số lượng chi tiết con không được âm, vui lòng thử lại \n";
            }elseif (!is_int($this->soLuongChiTietCon*1)){
                echo "Số lượng chi tiết không được là số thập phân, vui lòng thử lại \n";
            }
        } while (!is_numeric($this->soLuongChiTietCon) || $this->soLuongChiTietCon < 0 || !is_int($this->soLuongChiTietCon*1));
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            do {
                $this->loaiChiTiet = readline("Chi Tiết Đơn => Nhập 1 || Chi Tiết Phức => Nhập 2 :");
                if ($this->loaiChiTiet != 1 && $this->loaiChiTiet != 2 ) {
                    echo "Vui lòng chỉ chọn 1 hoặc 2 \n";
                }
            } while ($this->loaiChiTiet != 1 && $this->loaiChiTiet != 2 );
                $chiTiet = null ;
                if ($this->loaiChiTiet == 1) {
                    $chiTiet = new ChiTietDon();
                } else {
                    $chiTiet = new ChiTietPhuc();
                }
                $chiTiet->nhap();
                $this->dsChiTietCon[] = $chiTiet;
            }
    }

    public function xuat()
    {
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            echo "Thông Tin Chi Tiết Phức Thứ " . ($i + 1) . "\n";
            print_r($this->dsChiTietCon[$i]);
        }
    }
    public function tinhTien()
    {
        $tongTien = 0;
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            $tongTien += $this->dsChiTietCon[$i]->tinhTien();
        }
        return $tongTien;
    }

    public function tinhKhoiLuong()
    {
        // TODO: Implement tinhKhoiLuong() method.
        $tongKhoiLuong = 0;
        for ($i = 0; $i < $this->soLuongChiTietCon; $i++) {
            $tongKhoiLuong += $this->dsChiTietCon[$i]->tinhKhoiLuong();
        }
        return $tongKhoiLuong;
    }
}
