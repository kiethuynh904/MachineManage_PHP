<?php

require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";

class May
{
    public $maMay;
    public $tenMay;
    public $soLuongChiTietMay;
    public $dsChiTietMay = [];
    public $loaiChiTietMay;

    public function nhap()
    {
        $this->tenMay = readline("Nhap Ten May:");
        $this->maMay = readline("Nhap Ma May:");
        do {
            $this->soLuongChiTietMay = readline("Co Bao Nhieu Chi Tiet May:");
            if(!is_numeric($this->soLuongChiTietMay)){
                echo "So Luong Chi Tiet May Phai La So \n";
            }
            elseif($this->soLuongChiTietMay<0){
                echo"So Luong Chi Tiet May Khong Duoc La So Am \n";
            }
        } while (!is_numeric($this->soLuongChiTietMay) || $this->soLuongChiTietMay < 0);
        for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
            do{
                $this->loaiChiTietMay = readline("Chi Tiet Don => Nhap 1 || Chi Tiet Phuc => Nhap 2 :");
                if($this->loaiChiTietMay != 1 && $this->loaiChiTietMay !=2){
                    echo "Vui Long Chi Chon 1 Hoac 2 \n";
                }
            }while($this->loaiChiTietMay != 1 && $this->loaiChiTietMay != 2);
            if ($this->loaiChiTietMay == 1 || $this->loaiChiTietMay == 2) {
                if ($this->loaiChiTietMay == 1) {
                    $chiTietDon = new ChiTietDon();
                    $chiTietDon->nhap();
                    $this->dsChiTietMay[] = $chiTietDon;
                } else {
                    $chiTietPhuc = new ChiTietPhuc();
                    $chiTietPhuc->nhap();
                    $this->dsChiTietMay[] = $chiTietPhuc;
                }
            }
        }

    }

    public function xuatMay()
    {

        echo "Ten May :" . $this->tenMay . "\n";
        echo "Ma May :" . $this->maMay . "\n";
        echo "Danh Sach Chi Tiet:\n";
//        print_r($this->dsChiTietMay);
        for($i= 0 ; $i<$this->soLuongChiTietMay;$i++){
             print_r($this->dsChiTietMay[$i]);
        }
    }

    public function tinhTien()
    {
        if(sizeof($this->dsChiTietMay)==0){
            echo "khong co bat ki chi tiet con nao de tinh";
            die();
        }
        else{
            $tongTien = 0;
            for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
                $tongTien += $this->dsChiTietMay[$i]->tinhTien();
            }
            return $tongTien;
        }

    }

    public function tinhKhoiLuong()
    {
        if(sizeof($this->dsChiTietMay)==0){
            echo "khong co bat ki chi tiet con nao de tinh";
            die();
        }else{
            $tongKhoiLuong = 0 ;
            for($i = 0 ; $i < $this->soLuongChiTietMay;$i++){
                $tongKhoiLuong += $this->dsChiTietMay[$i]->tinhKhoiLuong();
            }
            return $tongKhoiLuong;
        }

    }
}

//$may = new May();
//$may->nhap();
//$may->xuat();
//echo "Tong Tien May La:". $may->tinhTien() . "\n";
