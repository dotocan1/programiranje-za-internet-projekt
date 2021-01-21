<?php
$id = $_GET["id"];
$author = $_GET["author"];
require('db.php');
$sql = "UPDATE autori SET author='$author' WHERE id=$id";
createData($sql);
?>