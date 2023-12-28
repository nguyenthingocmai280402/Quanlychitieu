<?php
session_start();
require_once("../dbConnect/lib_db.php");

$ac =  $_SESSION["account"];

$sql = "select * from nguoidung where TaiKhoan = \"$ac\"";

$dt = select_one($sql);

echo json_encode($dt);

?>