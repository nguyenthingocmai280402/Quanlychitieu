<?php
require_once("../dbConnect/lib_db.php");

$idHm = $_POST["idHm"];

$sql = "delete from hanmucchi where ID = $ID";

$rs = exec_update($sql);

echo $rs;
?>