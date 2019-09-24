<?php
require_once "ChiTietMay.php";
require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";
require_once "May.php";
require_once "Kho.php";

echo"**********WELLCOME TO MACHINE MANAGER**********\n";
$kho = new Kho();
$kho->nhapMay();
echo "================================================================== \n";
$kho->xuatMay();
echo "================================================================== \n";
echo "---------------------------THONG KE KHO---------------------------\n";
echo "Tong So Luong May: " . $kho->getSoLuongMay()."\n";
echo "Tong Tien Cua Danh Sach May: ".$kho->tinhTongTien() . "\n";
echo "Tong Khoi Luong Cua Danh Sach May: ".$kho->tinhTongKhoiLuong() . "\n";
echo "================================================================== \n";

//$ctp = new ChiTietPhuc();
//$ctp->nhap();
//$ctp->xuat();
