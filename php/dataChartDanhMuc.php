<?php
session_start();
require_once("../dbConnect/lib_db.php");

$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$ac = $_SESSION["account"];


$sql = "select sum(SoTien) as TongTien,TenDanhMuc 
from thuchi,danhmuc 
WHERE danhmuc.ID = thuchi.IDdm 
and danhmuc.LoaiDanhMuc = 1
and thuchi.ThoiGian <= '$endDate' 
and thuchi.ThoiGian >= '$startDate'
and thuchi.IDvi in (select vi.ID from vi,nguoidung WHERE vi.IDtk = nguoidung.ID and nguoidung.TaiKhoan = \"$ac\")
group by IDdm  ";

$dt = select_list($sql);

echo json_encode($dt);
?>