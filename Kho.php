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

    function nhapMay()
    {
        $this->soLuongMay = readline("Nhap So Luong May Can Nhap:");
        if (is_numeric($this->soLuongMay) && $this->soLuongMay >= 0) {
            for ($i = 0; $i < $this->soLuongMay; $i++) {
                echo "*****Nhap Thong Tin May Thu:" . "(" . ($i + 1) . ")" . "*****\n";
                $may = new May();
                $may->nhap();
                $this->dsMay[] = $may;
            }
        } elseif ($this->soLuongMay < 0) {
            echo "so luong may khong duoc la so am \n";
            $this->nhapMay();
        } else {
            echo "so luong may la con so, xin vui long thu lai \n";
            $this->nhapMay();
        }
    }

    function xuatMay()
    {
        echo "---------------------------THONG TIN KHO-------------------------- \n";
        for ($i = 0; $i < $this->soLuongMay; $i++) {
            echo "Thong Tin May Thu " . ($i + 1) . "\n";
            print_r($this->dsMay[$i]->xuatMay());
            echo "------------------------------------------------------------------\n";
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

