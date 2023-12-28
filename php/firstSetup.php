<?php
session_start();
require_once("../dbConnect/lib_db.php");



    if(isset($_SESSION["account"])){
        $id = $_SESSION["account"];

        $sql = "select ID from nguoidung where TaiKhoan = \"$id\"";
        $dt = select_one($sql);
        $id = $dt["ID"];
       
        $t = $_POST["money"];
        $sql = "insert into vi(IDtk,TenVi,SoTien) values($id,\"Tiền Mặt\",$t)";
        
        $checkInsertVi = exec_update($sql);
       


     $sqlDm =    "insert into danhmuc(TenDanhMuc,LoaiDanhMuc,IDtk) values
                    (\"Ăn uống\",1,$id),
                    (\"Đi lại\",1,$id),
                    (\"Cưới hỏi\",1,$id),
                    (\"Vui chơi\",1,$id),
                    (\"Đổ xăng\",1,$id),
                    (\"Lương\",0,$id),
                    (\"Thưởng\",0,$id),
                    (\"Vay nợ\",0,$id),
                    (\"Được cho\",0,$id)";
       
    $dm = exec_update($sqlDm);

        if($checkInsertVi == 1){
            $rs["success"] = "true";
        }
        else{
            $rs["success"] = "false";
        }
        echo json_encode($rs);
    }else{
        echo json_encode("no session");
    }
    

?>