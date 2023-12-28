<?php
session_start();

require_once("../dbConnect/lib_db.php");

$sql = "select ID from nguoidung where TaiKhoan = \"".$_SESSION["account"]."\"";


$dt = select_one($sql);

if($dt != null){
    $id = $dt["ID"];

    $sql = "select * from vi where IDtk = $id";

    $dt = select_list($sql);

    if(count($dt) == 0){
        echo "error1";
        die();
    }

    if($dt != null){
        $rs = ["data"=>$dt];
    }
    echo json_encode($rs);
}

?>