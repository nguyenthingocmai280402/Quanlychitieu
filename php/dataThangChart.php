
<?php
session_start();
require_once("../dbConnect/lib_db.php");

$year = $_POST["year"];
$month = $_POST["month"];
$ac = $_SESSION["account"];






$sql = "select thuchi.SoTien , day(thuchi.ThoiGian) as day,month(thuchi.ThoiGian) as month,danhmuc.TenDanhMuc as TenDanhMuc 
from thuchi,vi,danhmuc 
where thuchi.IDvi = vi.ID 
and thuchi.IDvi in (select vi.ID from vi,nguoidung WHERE vi.IDtk = nguoidung.ID and nguoidung.TaiKhoan = '$ac') 
and danhmuc.ID = thuchi.IDdm 
and thuchi.LoaiChiTieu = 1
and year(thuchi.ThoiGian) = '$year' 
and month(thuchi.ThoiGian) = '$month' 
order by thuchi.IDdm ASC,thuchi.ThoiGian ASC
";

$dt = select_list($sql);

echo json_encode($dt);
?>