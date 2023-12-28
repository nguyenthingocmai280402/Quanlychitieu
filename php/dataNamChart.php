<?php
session_start();
require_once("../dbConnect/lib_db.php");

$year = $_POST["year"];
$ac = $_SESSION["account"];


$sql = "select sum(thuchi.SoTien) as TongTien,month(thuchi.ThoiGian) as Thang
from thuchi,vi 
where thuchi.IDvi = vi.ID 
and thuchi.IDvi in (select vi.ID from vi,nguoidung WHERE vi.IDtk = nguoidung.ID and nguoidung.TaiKhoan = \"$ac\")
and year(thuchi.ThoiGian) = '$year'
group by month(thuchi.ThoiGian)
";

$dt = select_list($sql);

echo json_encode($dt);
?>