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
            $this->gia = readline('Nhap Gia:');

            if (!is_numeric($this->gia)) {
                echo "gia la so . vui long nhap lai \n";
            }
            elseif($this->gia<0){
                echo "gia khong duoc la so am \n";
            }
        } while (!is_numeric($this->gia) || $this->gia < 0);
        do {
            $this->khoiLuong = readline('Nhap Khoi Luong:');
            if (!is_numeric($this->khoiLuong) && $this->khoiLuong>0) {
                echo "khoi luong la so . vui long nhap lai \n";
            }
            elseif($this->khoiLuong<0){
                echo "khoi luong khong duoc la so am";
            }
        } while (!is_numeric($this->khoiLuong) || $this->khoiLuong < 0 );
    }
    public function xuat()
    {
        parent::xuat();
        echo "Gia Tien :" . $this->gia . "\n";
        echo "Khoi Luong:" . $this->khoiLuong . "\n";
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






