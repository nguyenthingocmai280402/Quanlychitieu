<?php
session_start();
require_once("../dbConnect/lib_db.php");

if(isset($_POST["account"]) && isset($_POST["pass"])){
    $ac = $_POST["account"];
    $pw = $_POST["pass"];

    $sql = "select * from nguoidung where TaiKhoan = \"$ac\"";
    $data = select_list($sql);
    if(count($data) == 0){
        echo "error1";
        die();
    }

    $sql = "select * from nguoidung where TaiKhoan = \"$ac\" and MatKhau = \"$pw\"";
    $data = select_one($sql);

    if($data != null){
        $rs = ["success"=>"true"];
        $_SESSION["account"] = $_POST["account"];
        $_SESSION["userName"] = $data["TenNguoiDung"];
    } 
    else
        $rs = ["success"=>"false"];
    echo json_encode($rs);
}








?>