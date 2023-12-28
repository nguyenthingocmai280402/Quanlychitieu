<?php
session_start();
require_once("../dbConnect/lib_db.php");

$ac = $_SESSION["account"];


$sql = "select year(thuchi.ThoiGian) as year
from thuchi,vi 
where thuchi.IDvi = vi.ID 
and thuchi.IDvi in (select vi.ID from vi,nguoidung WHERE vi.IDtk = nguoidung.ID and nguoidung.TaiKhoan = \"$ac\")
and thuchi.LoaiChiTieu = 1
GROUP by year(thuchi.ThoiGian)
";

$dt = select_list($sql);

echo json_encode($dt);
?>