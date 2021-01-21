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
          <a class="nav-link" href="./autori.php" target="_blank">Autori</a>
          <a class="nav-link active" href="#">Žanrovi</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Ovdje zavrsava navigacijska traka -->
  <div class="container-fluid">
    <form>
      <div class="mb=1">
        <label for="zanr-knjige" class="form-label mt-2">Žanr:</label>
        <input type="text" class="form-control" name="genre" id="genre">
      </div>
      <button id="send-data-zanrovi" class="btn btn-primary mt-2 mb-3">Spremi</button>
    </form>
    <!-- /form -->
    <div id="odgovor"></div>
  </div>
  <div class="container-fluid">
    <h2>Popis žanrova</h2>
    <table class="table">
      <tr>
        <th scope="col">Redni broj</th>
        <th scope="col">Ime žanra</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
      <?php
      //čitanje podataka iz baze
      require('db.php');
      readDataZanrovi();
      ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="./scripts/sendDataZanrovi.js"></script>
  <script src="./scripts/updateDataZanrovi.js"></script>
</body>

</html>