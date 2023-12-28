<?php
require_once("../dbConnect/lib_db.php");


 $viChuyen = $_POST["idViChuyen"];
 $viNhan = $_POST["idViNhan"];
 $soTien = $_POST["soTienChuyen"];

 $sql = "update vi set SoTien = SoTien - $soTien where ID = $viChuyen";

 $rs = exec_update($sql);


if($rs == 1){
    $sql = "update vi set SoTien = SoTien + $soTien where ID = $viNhan";
    // echo $sql;
    $kq = exec_update($sql);

    if($kq == 1){
        echo "ok";
        die();
    }
    else{
        echo "error2";
        die();
    }
}
echo "error1";
?>