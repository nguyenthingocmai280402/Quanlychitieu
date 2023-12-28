<?php


require_once("../dbConnect/lib_db.php");

$id = $_POST["idvi"];
$sql = "select SoTien from vi where ID = $id ";


$dt = select_one($sql);

if($dt != null){
    echo json_encode($dt["SoTien"]);
}

?>