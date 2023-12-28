<?php
session_start();
require_once("../dbConnect/lib_db.php");


$sqlID = "select ID from nguoidung where TaiKhoan = \"".$_SESSION["account"]."\"";
$dt = select_one($sqlID);
$id = $dt["ID"];

$tendm = $_POST["tendm"];
$loaidm = $_POST["loaidm"];

$sql = "select * from danhmuc where TenDanhMuc = \"$tendm\" and LoaiDanhMuc = $loaidm and IDtk = $id";
$rs = select_one($sql);

if(is_array($rs)){
    echo "error1";
    die();
}

$sql = "insert into danhmuc(TenDanhMuc,LoaiDanhMuc,IDtk) values(\"$tendm\",$loaidm,$id)";


$rs = exec_update($sql);


if($rs == 1){
    echo "ok";
}
else{
    echo "error";
}

?>