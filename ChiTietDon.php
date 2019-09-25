<?php
require_once "ChiTietMay.php";

class ChiTietDon extends ChiTietMay
{
    private $gia;
    private $khoiLuong;

    /**
     * @return mixed
     */
    public function nhap()
    {
        parent::nhap(); // TODO: Change the autogenerated stub
        do {
            $this->gia = readline('Nhập Giá:');

            if (!is_numeric($this->gia)) {
                echo "Giá phải là số, vui lòng nhập lại \n";
            }
            elseif($this->gia<0){
                echo "Giá không được là số âm, vui lòng nhập lại \n";
            }
        } while (!is_numeric($this->gia) || $this->gia < 0);
        do {
            $this->khoiLuong = readline('Nhap Khoi Luong:');
            if (!is_numeric($this->khoiLuong) && $this->khoiLuong>0) {
                echo "Khối lượng phải là số, vui lòng nhập lại \n";
            }
            elseif($this->khoiLuong<0){
                echo "Khối lượng không được là số âm, xin vui lòng nhập lại";
            }
        } while (!is_numeric($this->khoiLuong) || $this->khoiLuong < 0 );
    }
    public function xuat()
    {
        parent::xuat();
        echo "Giá Tiền :" . $this->gia . "\n";
        echo "Khối Lượng:" . $this->khoiLuong . "\n";
    }

    public function tinhTien()
    {
        // TODO: Implement TinhTien() method.
        return $this->gia;
    }

    public function tinhKhoiLuong()
    {
        // TODO: Implement TinhKhoiLuong() method.
        return $this->khoiLuong;
    }
}






