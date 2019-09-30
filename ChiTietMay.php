<?php
//Class Chi Tiet May
abstract class ChiTietMay{
    private $maChiTiet;
    public function nhap(){
        do{
            $this->maChiTiet = readline('Nhap Ma Chi Tiet:');
            if(empty(trim($this->maChiTiet))){
                echo "Mã chi tiết không được bỏ trống, xin vui lòng nhập lại \n";
            }
        }while(empty(trim($this->maChiTiet)));
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

