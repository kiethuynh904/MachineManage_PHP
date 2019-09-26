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
        do{
            $this->tenMay = readline("Nhập Tên Máy:");
            if(empty(trim($this->tenMay))){
                echo "Tên máy không được bỏ trống, vui lòng nhập lại \n";
            }
        }while(empty(trim($this->tenMay," ")));
        do{
            $this->maMay = readline("Nhập Mã Máy:");
            if(empty(trim($this->maMay))){
                echo "Mã máy không được bỏ trống, vui lòng nhập lại \n";
            }
        }while(empty(trim($this->maMay," ")));

        do {
            $this->soLuongChiTietMay = readline("Có Bao Nhiêu Chi Tiết Máy:");
            if(!is_numeric($this->soLuongChiTietMay)){
                echo "Số lượng chi tiết máy phải là số, xin vui lòng thử lại \n";
            }
            elseif($this->soLuongChiTietMay<0){
                echo"Số lượng chi tiết máy không được là số âm, xin vui lòng thử lại \n";
            }
            elseif (!myIsInt($this->soLuongChiTietMay)){
                echo"Số lượng chi tiết máy không được là số thập phân, xin vui lòng thử lại";
            }
        } while (!is_numeric($this->soLuongChiTietMay) || $this->soLuongChiTietMay < 0 || !myIsInt($this->soLuongChiTietMay));
        for ($i = 0; $i < $this->soLuongChiTietMay; $i++) {
            do{
                $this->loaiChiTietMay = readline("Chi Tiết Đơn => Nhập 1 || Chi Tiết Phức => Nhập 2 :");
                if($this->loaiChiTietMay != 1 && $this->loaiChiTietMay !=2 || !is_numeric($this->loaiChiTietMay)){
                    echo "Vui lòng chỉ chọn 1 hoặc 2 \n";
                }
            }while($this->loaiChiTietMay != 1 && $this->loaiChiTietMay != 2 || !is_numeric($this->loaiChiTietMay));
            if ($this->loaiChiTietMay == 1 || $this->loaiChiTietMay == 2) {
                $chiTiet = null;
                if ($this->loaiChiTietMay == 1) {
                    $chiTiet = new ChiTietDon();

                } else {
                    $chiTiet = new ChiTietPhuc();
                }
                $chiTiet->nhap();
                $this->dsChiTietMay[] = $chiTiet;
            }
        }

    }
    function myIsInt($value)
    {
        $tmp = (int) $value;
        if ($tmp == $value) {
            return true;
        } else {
            return false;
        }
    }
    public function xuatMay()
    {

        echo "Tên Máy :" . $this->tenMay . "\n";
        echo "Mã Máy :" . $this->maMay . "\n";
        echo "Danh Sách Chi Tiết :\n";
        echo "Giá Của Máy Là:" . $this->tinhTien() ."\n";
        echo "Khối Lượng Của Máy Là:" .$this->tinhKhoiLuong() ."\n";
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


