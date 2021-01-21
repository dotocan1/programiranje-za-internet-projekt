<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles.css">
  <title>Online biblioteka</title>
  <link rel="shortcut icon" href="./images/minecraft-pocket-edition-enchanted-book-wiki-png-favpng-KZsYSS5Cz0pfMvmC8W9G20yc4.jpg"/>
</head>

<body>
<!-- Ovdje pocinje navigacijska traka -->
<nav class="navbar navbar-expand-lg navbar-dark color-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php" target="_blank">e-Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="./index.php" target="_blank">Početna</a>
          <a class="nav-link active" href="./autori.php">Autori</a>
          <a class="nav-link" href="./zanrovi.php" target="_blank">Žanrovi</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Ovdje zavrsava navigacijska traka -->
  <div class="container-fluid">
    <div class='row'> 
      <?php
      $id = $_GET['id'];
      ?>
      <?php
      require_once('db.php');
      readDataAutor($id);
      ?>
      <!-- /form -->
      <div id="odgovor"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="./scripts/sendDataAutori.js"></script>
</body>

</html>