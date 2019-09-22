<?php
require_once "ChiTietMay.php";
require_once "ChiTietDon.php";
require_once "ChiTietPhuc.php";
require_once "May.php";
require_once "Kho.php";

echo"****WELLCOME TO MACHINE MANAGER****\n";
$kho = new Kho();
$kho->nhapMay();
$kho->xuatMay();
echo $kho->tinhTongTien();
echo $kho->tinhTongKhoiLuong();
