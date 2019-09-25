<?php
require_once "ChiTietMay.php";
require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";
require_once "May.php";
require_once "Kho.php";


echo "**********WELLCOME TO MACHINE MANAGER**********\n";
echo "Danh Sach Chuc Nang\n";
echo "1.Chi Tiet Don \n";
echo "2.Chi Tiet Phuc \n";
echo "3.May\n";
echo "4.Kho\n";
do {
    $luaChon = readline('Moi Nhap Lua Chon:');
    var_dump($luaChon);
    var_dump(is_double($luaChon));
    var_dump(is_numeric($luaChon));
    var_dump(($luaChon>=1 && $luaChon<=4) && is_double($luaChon));

    if (($luaChon>=1 && $luaChon<=4) && !is_int($luaChon)) {
        echo "Nhap Tu 1 Toi 4  :( ! \n";
    }

// elseif (!is_double($luaChon)) {
//        echo "Nhap So Nguyen Di :( ! \n";
//    }
} while (($luaChon>=1 && $luaChon<=4) && !is_int($luaChon));

switch ($luaChon) {
    case 1:
        $ctd = new ChiTietDon();
        echo "--------------------NHAP THONG TIN CHI TIET DON-------------------\n";
        $ctd->nhap();
        echo "================================================================== \n";
        echo "----------------------THONG TIN CHI TIET DON----------------------\n";
        $ctd->xuat();
        echo "================================================================== \n";
        break;
    case 2:
        $ctp = new ChiTietPhuc();
        echo "-------------------NHAP THONG TIN CHI TIET PHUC-------------------\n";
        $ctp->nhap();
        echo "================================================================== \n";
        echo "---------------------THONG TIN CHI TIET PHUC----------------------\n";
        $ctp->xuat();
        echo "================================================================== \n";
        break;
    case 3:
        $may = new May();
        echo "------------------------NHAP THONG TIN MAY------------------------\n";
        $may->nhap();
        echo "================================================================== \n";
        echo "----------------------------THONG TIN MAY-------------------------\n";
        $may->xuatMay();
        echo "Gia Tien Cua May La: " . $may->tinhTien() . "\n";
        echo "Khoi Luong Cua May La: " . $may->tinhKhoiLuong() . "\n";
        echo "================================================================== \n";

        break;
    case 4:
        $kho = new Kho();
        $kho->nhapMay();
        echo "================================================================== \n";
        $kho->xuatMay();
        echo "================================================================== \n";
        echo "---------------------------THONG KE KHO---------------------------\n";
        echo "Tong So Luong May: " . $kho->getSoLuongMay() . "\n";
        echo "Tong Tien Cua Danh Sach May: " . $kho->tinhTongTien() . "\n";
        echo "Tong Khoi Luong Cua Danh Sach May: " . $kho->tinhTongKhoiLuong() . "\n";
        echo "================================================================== \n";
        break;
}









