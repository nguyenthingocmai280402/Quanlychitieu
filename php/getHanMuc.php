<?php
session_start();
require_once("../dbConnect/lib_db.php");

$sql = "select ID from nguoidung where TaiKhoan = \"".$_SESSION["account"]."\"";

$dt = select_one($sql);


if($dt != null){
    $id = $dt["ID"];

    $sql = "select hanmucchi.ID as ID,hanmucchi.TenHanMuc as TenHanMuc,hanmucchi.SoTienHanMuc as SoTienHanMuc,danhmuc.TenDanhMuc as TenDanhMuc,vi.TenVi as TenVi
    where hanmucchi.ID = vi.ID
    and hanmucchi.ID = danhmuc.ID
    and vi.ID in (select ID from vi where vi.IDtk =$id);";

    $rs = select_list($sql);

    echo json_encode($rs);
}

?>