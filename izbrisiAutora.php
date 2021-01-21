<?php
$id = $_GET["id"];
require('db.php');
$sql = "DELETE FROM autori WHERE id=$id";
createData($sql);
?>