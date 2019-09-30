<?php

/**
 * @desc Class này để định nghĩa các class con kế thừa
 * @author kiethuynh0904@gmail.com
 */
abstract class ChiTietMay
{
    /**
     * @type string
     */
    private $maChiTiet;

    /**
     * @desc Hàm nhập mã chi tiết
     * @input Mã chi tiết
     */
    public function nhap()
    {
        do {
            $this->maChiTiet = readline('Nhap Ma Chi Tiet:');
            if (empty(trim($this->maChiTiet))) {
                echo "Mã chi tiết không được bỏ trống, xin vui lòng nhập lại \n";
            }
        } while (empty(trim($this->maChiTiet)));
    }

    /**
     * @desc Hàm xuất mã chi tiết
     * @output Mã chi tiết
     */
    public function xuat()
    {
        echo "Ma Chi Tiet La:" . $this->maChiTiet . "\n";
    }

    public function getMaSo()
    {
        return $this->maChiTiet;
    }

    /**
     * @desc abtract method định nghĩa method tính tiền cho các lớp con kế thừa có thể dùng hoặc không
     */
    abstract function tinhTien();

    abstract function tinhKhoiLuong();
}

