<?php
require_once("../dbConnect/lib_db.php");

$idHm = $_POST["ID"];
$tenHm = $_POST["TenHanMuc"];
$soTien = $_POST["SoTienHanMuc"];
$lapLai = $_POST["LapLai"];

$sql = "update hanmucchi set TenHanMuc = \"$tenHm\" , SoTienHanMuc = $soTien , LapLai = \"$lapLai\" where ID = $ID";

$rs = exec_update($sql);

echo $rs;
?>