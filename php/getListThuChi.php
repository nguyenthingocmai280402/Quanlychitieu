<?php

session_start();
require_once("../dbConnect/lib_db.php");
$ac = $_SESSION["account"];

$sql = "select thuchi.ID,ThoiGian,thuchi.SoTien,GhiChu,LoaiChiTieu,TenDanhMuc,LoaiDanhMuc,TenVi from thuchi,danhmuc,vi,nguoidung where thuchi.IDdm = danhmuc.ID and thuchi.IDvi = vi.ID and nguoidung.TaiKhoan = \"$ac\" and vi.IDtk = nguoidung.ID order by ThoiGian desc";


$dt = select_list($sql);

if(count($dt) > 0)
    if($dt != null){
        echo json_encode($dt);
        die();
    }

echo "-1";
?>