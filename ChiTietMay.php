<?php
abstract class ChiTietMay{
    public $maChiTiet;


    public function nhap(){

        $this->maChiTiet = readline('Nhap Ma Chi Tiet:');
    }
    public function xuat(){
            echo "Ma Chi Tiet La:" . $this->maChiTiet . "\n";
    }
    public function getMaSo(){
        return $this->maChiTiet;
    }



    abstract function tinhTien();
    abstract function tinhKhoiLuong();
}

