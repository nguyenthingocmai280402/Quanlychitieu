<?php
session_start();
require_once("../dbConnect/lib_db.php");

$sqlID = "select ID from nguoidung where TaiKhoan = \"".$_SESSION["account"]."\"";

$dt = select_one($sqlID);

$id = $dt["ID"];


$sql = "select * from danhmuc where IDtk = $id order by ID DESC";

$dm = select_list($sql);

if(count($dm) == 0){
    echo "empty";
    die();
}


$rs = ["data"=>$dm];


echo json_encode($rs);
?>