<?php

require_once("../dbConnect/lib_db.php");

$id = $_POST["id"];
$sql = "delete from thuchi where IDvi = $id";
$rs = exec_update($sql);
$sql = "delete from vi where ID = $id";
$rs = exec_update($sql);

if($rs == 1){
    echo "success";
}else{
    echo "error";
}

?>