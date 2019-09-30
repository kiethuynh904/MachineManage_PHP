<?php
require_once "ChiTietMay.php";
require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";
require_once "May.php";
require_once "Kho.php";

echo "**********WELLCOME TO MACHINE MANAGER**********\n";
echo "Danh Sách Chức Năng\n";
echo "1.Chi Tiết Đơn \n";
echo "2.Chi Tiết Phức \n";
echo "3.Máy\n";
echo "4.Kho\n";
echo "0.Thoát\n";

do {
    $luaChon = readline('Mời Nhập Lựa Chọn:');
    if (!is_numeric($luaChon)) {
        echo "Vui Lòng Nhập Lại, Chỉ Nhập Số \n";
    } elseif ($luaChon < 0 || $luaChon > 4) {
        echo "Vui Lòng Nhập Lại, Chỉ Nhập Từ 1 Tới 4 ! \n";
    } elseif (($luaChon >= 0 && $luaChon <= 4) && !is_int($luaChon * 1)) {
        echo "Đừng Nhập Số Thập Phân Anh Ơi :( \n";
    }
} while (!is_numeric($luaChon) || $luaChon < 0 || $luaChon > 4 || ($luaChon >= 0 && $luaChon <= 4) && !is_int($luaChon * 1));
switch ($luaChon) {
    case 1:
        $ctd = new ChiTietDon();
        echo "--------------------NHẬP THÔNG TIN CHI TIẾT ĐƠN-------------------\n";
        $ctd->nhap();
        echo "================================================================== \n";
        echo "----------------------THÔNG TIN CHI TIẾT ĐƠN----------------------\n";
        $ctd->xuat();
        echo "================================================================== \n";
        break;
    case 2:
        $ctp = new ChiTietPhuc();
        echo "-------------------NHẬP THÔNG TIN CHI TIẾT PHỨC-------------------\n";
        $ctp->nhap();
        echo "================================================================== \n";
        echo "---------------------THÔNG TIN CHI TIẾT PHỨC----------------------\n";
        $ctp->xuat();
        echo "================================================================== \n";
        break;
    case 3:
        $may = new May();
        echo "------------------------NHẬP THÔNG TIN MÁY------------------------\n";
        $may->nhap();
        echo "================================================================== \n";
        echo "----------------------------THÔNG TIN MÁY-------------------------\n";
        $may->xuatMay();
        echo "================================================================== \n";
        break;
    case 4:
        $kho = new Kho();
        $kho->nhapKho();
        echo "================================================================== \n";
        $kho->xuatKho();
        echo "================================================================== \n";
        echo "---------------------------THÔNG KÊ KHO---------------------------\n";
        echo "Tổng Số Lượng Máy: " . $kho->getSoLuongMay() . "\n";
        echo "Tổng Tiền Của Danh Sách Máy: " . $kho->tinhTongTien() . "\n";
        echo "Tổng Khối Lượng Của Danh Sách Máy: " . $kho->tinhTongKhoiLuong() . "\n";
        echo "================================================================== \n";
        break;
    case 0:
        die("--------------See You Again-------------- \n");
        break;
}









