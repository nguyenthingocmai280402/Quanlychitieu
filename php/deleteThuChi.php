<?php
session_start();

require_once("../dbConnect/lib_db.php");

$id = $_POST["id"];
$tienXoa = $_POST["tienXoa"];
$typeDel = $_POST["typeDel"];

$sql = "select IDvi from thuchi where ID = $id";

$rowVi = select_one($sql);
$idVi = $rowVi["IDvi"];


if($typeDel == "1"){
    $sql = "update vi set SoTien = SoTien + $tienXoa where ID = $idVi";
}
else{
    $sql = "update vi set SoTien = SoTien - $tienXoa where ID = $idVi";
}

$dt = exec_update($sql);

$sql = "delete from thuchi where ID = $id";
$dt = exec_update($sql);


if($dt == 1)
    echo "Đã xóa $id";
?>