
<?php
$author = $_GET["author"];
require('db.php');
$sql = "INSERT INTO autori (author) VALUES 
  ('$author');";
createData($sql);
?>
