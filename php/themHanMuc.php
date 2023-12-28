<?php
session_start();
require_once("../dbConnect/lib_db.php");

$tenHm = $_POST["TenHanMuc"];
$soTien = $_POST["SoTienHanMuc"];
$idVi = $_POST["IDvi"];
$idDm = $_POST["IDdm"];
$lapLai = $_POST["LoaiLapLai"];

$sqlCheck = "select * from hanmucchi where ID = $ID and select * from hanmucchidanhmuc where IDdm = $idDm";

$rs = select_one($sqlCheck);
if($rs != null){
    echo "error1";
    die();
}

$sql = "INSERT INTO hanmucchi(TenHanMuc, SoTienHanMuc, IDvi, IDdm, IDll) values(\"$tenHm\",$soTien,$idVi,$idDm,\"$lapLai\")";

$dt = exec_update($sql);
echo $dt;


?>