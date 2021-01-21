<?php
$id = $_GET["id"];
$statusKnjige = $_GET["statusKnjige"];


require('db.php');
$sql = "UPDATE knjige SET statusKnjige='$statusKnjige' WHERE id=$id";
createData($sql);
