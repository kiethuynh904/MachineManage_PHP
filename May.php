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
        $this->soLuongChiTietMay = readline("Nhap So Luong Chi Tiet May");
        if(is_numeric($this->soLuongChiTietMay)){
            for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
                $this->loaiChiTietMay = readline("Chi Tiet Don => Nhap 1 || Chi Tiet Phuc => Nhap 2 : \n");
                if ($this->loaiChiTietMay == "1") {
                    $chiTietDon = new ChiTietDon();
                    $chiTietDon->nhap();
                    $this->dsChiTietMay[] = $chiTietDon;
                } else {
                    $chiTietPhuc = new ChiTietPhuc();
                    $chiTietPhuc->nhap();
                    $this->dsChiTietMay[] = $chiTietPhuc;
                }
            }
        }else{
            echo"vui long nhap lai, so luong may phai la con so";
            $this->nhap();
        }
    }

    public function xuat()
    {
        echo "------THONG TIN MAY------ \n";
        echo "Ten May :" . $this->tenMay . "\n";
        echo "Ma May :" . $this->maMay . "\n";
        echo "Danh Sach Chi Tiet:";
        print_r($this->dsChiTietMay);

//        for($i= 0 ; $i<$this->soLuongChiTietMay;$i++){
//            echo"Thong Tin May Thu " . ($i+1) . "\n";
//             $this->dsChiTietMay[$i]->xuat();
//        }
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
