<?php
require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";
class May
{
    private $maMay;
    private $tenMay;
    private $soLuongChiTietMay;
    private $dsChiTietMay = [];
    private $loaiChiTietMay;
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

        echo "Tên Máy :" . $this->tenMay . "\n";
        echo "Mã Máy :" . $this->maMay . "\n";
        echo "Danh Sách Chi Tiết :\n";
        for($i= 0 ; $i<$this->soLuongChiTietMay;$i++){
             print_r($this->dsChiTietMay[$i]);
        }
    }

    public function tinhTien()
    {
            $tongTien = 0;
            for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
                $tongTien += $this->dsChiTietMay[$i]->tinhTien();
            }
            return $tongTien;
    }

    public function tinhKhoiLuong()
    {
            $tongKhoiLuong = 0 ;
            for($i = 0 ; $i < $this->soLuongChiTietMay;$i++){
                $tongKhoiLuong += $this->dsChiTietMay[$i]->tinhKhoiLuong();
            }
            return $tongKhoiLuong;
    }
}


