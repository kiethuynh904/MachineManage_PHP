<?php
//Class Chi Tiet May
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
    public function myIsInt($value){
        $tmp = (int) $value;
        if ($tmp == $value) {
            return true;
        } else {
            return false;
        }
    }


    abstract function tinhTien();
    abstract function tinhKhoiLuong();
}

