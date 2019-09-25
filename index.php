<?php
require_once "ChiTietMay.php";
require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";
require_once "May.php";
require_once "Kho.php";


function myIsInt($value)
{
    $tmp = (int) $value;
    if ($tmp == $value) {
       return true;
    } else {
       return false;
    }
}

echo "**********WELLCOME TO MACHINE MANAGER**********\n";
echo "Danh Sach Chuc Nang\n";
echo "1.Chi Tiet Don \n";
echo "2.Chi Tiet Phuc \n";
echo "3.May\n";
echo "4.Kho\n";

do {
    $luaChon = readline('Moi Nhap Lua Chon:');
    if (!is_numeric($luaChon)) {
        echo "Vui Lòng Nhập Lại, Chỉ Nhập Số \n";
    } elseif ($luaChon < 1 || $luaChon > 4) {
        echo "Vui Lòng Nhập Lại, Chỉ Nhập Từ 1 Tới 4 ! \n";
    } elseif (($luaChon >= 1 && $luaChon <= 4) && !myIsInt($luaChon)) {
        echo "Đừng Nhập Số Thập Phân Anh Ơi :( \n";
    }
} while (!is_numeric($luaChon) || $luaChon < 1 || $luaChon > 4 || ($luaChon >= 1 && $luaChon <= 4) && !myIsInt($luaChon));

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
        echo "================================================================== \n";

        break;
    case 4:
        $kho = new Kho();
        $kho->nhapKho();
        echo "================================================================== \n";
        $kho->xuatKho();
        echo "================================================================== \n";
        echo "---------------------------THONG KE KHO---------------------------\n";
        echo "Tong So Luong May: " . $kho->getSoLuongMay() . "\n";
        echo "Tong Tien Cua Danh Sach May: " . $kho->tinhTongTien() . "\n";
        echo "Tong Khoi Luong Cua Danh Sach May: " . $kho->tinhTongKhoiLuong() . "\n";
        echo "================================================================== \n";
        break;
}









