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
  <nav class="navbar navbar-expand-lg navbar-dark color-navbar mb-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">e-Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">Početna</a>
          <a class="nav-link" href="./autori.php" target="_blank">Autori</a>
          <a class="nav-link" href="./zanrovi.php" target="_blank">Žanrovi</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Ovdje zavrsava navigacijska traka -->
  <h1>Online biblioteka</h1>
  <div class="container-fluid myContent">
    <div class="row book-form gy-5 justify-content-md-center">
      <div class="mb-3 col-6">
      </div>
    </div>
  </div>
  <p class="center-element">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Dodaj knjigu
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <!-- upisivanje podataka -->
      <div class="container-fluid myContent">
        <form>
          <div class="row book-form gy-5 justify-content-md-center">
            <div class="mb-3 col-6">
              <label for="naslov-knjige" class="form-label">Naslov knjige:</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>
          </div>
          <div class="row book-form gy-5 justify-content-md-center">
            <div class="mb-3 col-6">
              <label for="autor-knjige" class="form-label">Autor:</label>
              <select name="author" id="author" class="form-select" aria-label="Default select example">
                <option selected disabled>Odaberite autora:</option>
                <?php
                require_once('db.php');
                readDataSelectAutori();
                ?>
              </select>
              <a href="./autori.php" class="btn btn-primary mt-2" target="_blank">Dodaj autora:</a>
            </div>
          </div>
          <div class="row book-form gy-5 justify-content-md-center">
            <div class="mb-3 col-6">
              <label for="zanr-knjige" class="form-label">Žanr:</label>
              <select name="genre" id="genre" class="form-select" aria-label="Default select example">
                <option selected disabled>Odaberite žanr:</option>
                <?php
                require_once('db.php');
                readDataSelectZanrovi();
                ?>
              </select>
              <a href="./zanrovi.php" class="btn btn-primary mt-2" target="_blank">Dodaj žanr</a>
            </div>
          </div>
          <div class="row book-form gy-5 justify-content-md-center">
            <div class="mb-3 col-6">
              <label for=" broj-stranica-knjige" class="form-label">Broj stranica:</label>
              <input type="text" class="form-control" name="numberOfPages" id="numberOfPages">
            </div>
          </div>
          <div class="row book-form gy-5 justify-content-md-center">
            <div class="col-6"><button id="send-data-knjige" class="btn btn-primary mt-2">Spremi knjigu</button></div>
          </div>
        </form>
        <!-- Ispis statusa -->
        <div id="odgovor"></div>
      </div>
    </div>
  </div>
  <!-- Čitanje i stavljanje podataka u tablicu iz baze podataka -->
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <h2 style="margin-bottom: 1em;">Popis knjiga</h2>
        <table class="table">
          <tr>
            <th scope="col">Redni broj</th>
            <th scope="col">Naslov knjige</th>
            <th scope="col">Autor knjige</th>
            <th scope="col">Zanr knjige</th>
            <th scope="col">Broj stranica</th>
            <th scope="col">Status knjige</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
          <?php
          //čitanje podataka iz baze
          require_once('db.php');
          readDataKnjige();
          ?>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="./scripts/sendDataKnjige.js"></script>
  <script src="./scripts/updateDataKnjige.js"></script>
</body>

</html>