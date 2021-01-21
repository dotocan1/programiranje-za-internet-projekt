<?php
$id = $_GET["id"];
$genre = $_GET["genre"];
require('db.php');
$sql = "UPDATE zanrovi SET genre='$genre' WHERE id=$id";
createData($sql);
?>