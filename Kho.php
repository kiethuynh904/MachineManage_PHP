<?php
require_once "May.php";
require_once "ChiTietPhuc.php";
require_once "ChiTietDon.php";

class Kho
{
    private $dsMay = [];
    private $soLuongMay;


    function getSoLuongMay()
    {
        return $this->soLuongMay;
    }
    function nhapKho()
    {
        do {
            $this->soLuongMay = readline("Nhập Số Lượng Máy Muốn Nhập Vào Kho:");
            if(!is_numeric($this->soLuongMay)){
                echo "Số lượng kho phải là số, xin vui lòng thử lại \n";
            }
            elseif($this->soLuongMay<0){
                echo"Số lượng kho không được là số âm, xin vui lòng thử lại \n";
            }
            elseif (!is_int($this->soLuongMay*1)){
                echo"Số lượng kho không được là số thập phân, xin vui lòng thử lại";
            }
        } while (!is_numeric($this->soLuongMay) || $this->soLuongMay < 0 || !is_int($this->soLuongMay*1));
        if (is_numeric($this->soLuongMay) && $this->soLuongMay >= 0) {
            for ($i = 0; $i < $this->soLuongMay; $i++) {
                echo "*****Nhập Thông Tin Máy Thứ:" . "(" . ($i + 1) . ")" . "*****\n";
                $may = new May();
                $may->nhap();
                $this->dsMay[] = $may;
            }
        } elseif ($this->soLuongMay < 0) {
            echo "Số lượng máy không được là số âm, xin vui lòng nhập lại\n";
            $this->nhapMay();
        } else {
            echo "Số lượng máy phải là con số, xin vui lòng nhập lại \n";
            $this->nhapMay();
        }
    }
    function xuatKho()
    {
        echo "---------------------------THÔNG TIN KHO-------------------------- \n";
        if(sizeof($this->dsMay)==0){
        echo"Kho Trống \n";
        }else{
            for ($i = 0; $i < $this->soLuongMay; $i++) {
                echo "Thông Tin Máy Thứ " . ($i + 1) . "\n";
                print_r($this->dsMay[$i]->xuatMay());
                echo "------------------------------------------------------------------\n";
            }
        }
    }
    function tinhTongTien()
    {
        $tongTien = 0;
        for ($i = 0; $i < $this->soLuongMay; $i++) {
            $tongTien += $this->dsMay[$i]->tinhTien();
        }
        return $tongTien;
    }
    function tinhTongKhoiLuong()
    {
        $tongKhoiLuong = 0;
        for ($i = 0; $i < $this->soLuongMay; $i++) {
            $tongKhoiLuong += $this->dsMay[$i]->tinhKhoiLuong();
        }
        return $tongKhoiLuong;
    }
}


