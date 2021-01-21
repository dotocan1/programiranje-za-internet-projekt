<?php
$title = $_GET["title"];
$numberOfPages = $_GET["numberOfPages"];
$statusKnjige = $_GET["statusKnjige"];
$FK_ID_autora = $_GET["FK_ID_autora"];
$FK_ID_zanra = $_GET["FK_ID_zanra"];

require('db.php');
$sql = "INSERT INTO knjige (title, numberOfPages, statusKnjige, FK_ID_autora, FK_ID_zanra) VALUES 
  ('$title', '$numberOfPages', '$statusKnjige', '$FK_ID_autora', '$FK_ID_zanra');";
createData($sql);
?>
