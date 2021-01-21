
<?php
  $genre = $_GET["genre"];
  require ('db.php');
  $sql ="INSERT INTO zanrovi (genre) VALUES 
  ('$genre');";
  createData($sql);
?>
