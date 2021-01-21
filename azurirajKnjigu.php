<?php
$id = $_GET["id"];
$title = $_GET["title"];
$numberOfPages = $_GET["numberOfPages"];
$FK_ID_autora = $_GET["FK_ID_autora"];
$FK_ID_zanra = $_GET["FK_ID_zanra"];

require('db.php');
$sql = "UPDATE knjige SET title='$title', numberOfPages='$numberOfPages', FK_ID_autora='$FK_ID_autora', FK_ID_zanra='$FK_ID_zanra' WHERE id=$id";
createData($sql);
