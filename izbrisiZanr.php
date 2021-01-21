<?php
$id = $_GET["id"];
require('db.php');
$sql = "DELETE FROM zanrovi WHERE id=$id";
createData($sql);
?>
