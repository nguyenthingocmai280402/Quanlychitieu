<?php
session_start();
require_once("../dbConnect/lib_db.php");


$sqlOldPass = "select MatKhau from nguoidung where TaiKhoan = \"".$_SESSION["account"]."\"";

$dt = select_one($sqlOldPass);

$oldPass = $dt["MatKhau"];

if($oldPass != $_POST["oldPass"]){
    echo "error1";
}else{
    $sql = "update nguoidung set MatKhau = \"".$_POST["newPass"]."\" where TaiKhoan = \"".$_SESSION["account"]."\"";

    $dt = exec_update($sql);
    if($dt == 1)
        echo "ok";
    else
        echo "error2";
}



?>