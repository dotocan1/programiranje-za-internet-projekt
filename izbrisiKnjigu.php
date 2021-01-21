<?php
$id = $_GET["id"];
require('db.php');
$sql = "DELETE FROM knjige WHERE id=$id";
createData($sql);
?>