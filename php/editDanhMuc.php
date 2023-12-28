<?php
session_start();
require_once("../dbConnect/lib_db.php");

$sqlID = "select ID from nguoidung where TaiKhoan = \"".$_SESSION["account"]."\"";

$dt = select_one($sqlID);

$idtk = $dt["ID"];
$id = $_POST["id"];
$newName = $_POST["newName"];

$sqlGetDM = "select * from danhmuc where IDtk = $idtk and TenDanhMuc = \"$newName\" and ID <> $id";
$checkDM = select_list($sqlGetDM);
if(count($checkDM) > 0){
    echo "exist";
    die();
}


$sql = "update danhmuc set TenDanhMuc = \"$newName\" where ID = $id and IDtk = $idtk";

$rs = exec_update($sql);

if($rs == 1)
    echo "ok";
?>