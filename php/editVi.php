<?php
session_start();

require_once("../dbConnect/lib_db.php");

$sqlID = "select ID from nguoidung where TaiKhoan = \"".$_SESSION["account"]."\"";
$tenVi = $_POST["tenVi"];
$idVi = $_POST["idVi"];


$dt = select_one($sqlID);

if($dt != null){
    $id = $dt["ID"];


    $sql = "select * from vi where TenVi = \"$tenVi\" and IDtk = $id";
    $rs = select_one($sql);
    
    if(is_array($rs)){
        echo "error1";
        die();
    }

    $sql = "update vi set TenVi = \"$tenVi\" where ID = $idVi";

    $rs = exec_update($sql);
    if($rs == 1){
        echo "ok";
    }
    else{
        echo "error";
    }
}









?>