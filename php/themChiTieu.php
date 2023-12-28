<?php

require_once("../dbConnect/lib_db.php");

if(isset($_POST)){
    $IDdm = $_POST["danhmuc"];
    $IDvi = $_POST["vi"];
    $soTienChi = $_POST["sotienchi"];
    $ghiChu = $_POST["ghichu"];
    $thoiGian = $_POST["thoigian"];
    $loaiChiTieu = $_POST["loai"];


    $sql = "update vi set SoTien = SoTien - $soTienChi where ID = $IDvi";

    $checkUpdateVi = exec_update($sql);
    if($checkUpdateVi == 1){
    }else{
        $rs = ["success"=>"false"];
        echo json_encode($rs);
        die();
    }
    $sql = "insert into thuchi(IDdm,IDvi,ThoiGian,GhiChu,SoTien,LoaiChiTieu) values($IDdm,$IDvi,\"$thoiGian\",\"$ghiChu\",$soTienChi,$loaiChiTieu)";

    $checkThem = exec_update($sql);

    if($checkThem == 1){
        $rs = ["success"=>"true"];
    }else{
        $rs = ["success"=>"false"];
    }

    echo json_encode($rs);
}




?>