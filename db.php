<?php
function connection()
{
  //1.otvaranje konekcije
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "e-library";

  $conn = mysqli_connect($server, $username, $password, $database);
  return $conn;
}

function readDataKnjige()
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT knjige.id, knjige.title, autori.author, zanrovi.genre, knjige.numberOfPages, knjige.statusKnjige  from knjige join zanrovi on knjige.FK_ID_zanra = zanrovi.id join autori on knjige.FK_ID_autora = autori.id";
  $res = mysqli_query($conn, $sql);
  $field_count = mysqli_field_count($conn);
  while ($row = mysqli_fetch_array($res)) {
    echo "<tr>";
    for ($num = 0; $num < $field_count; $num++) {
      echo "<td>" . $row[$num] . "</td>";
    }
    echo "<td><a href='knjigeAzuriraj.php?id=$row[0]'>";
    echo "<button id='update-data-knjige' class='btn btn-primary'>Ažuriraj</button>";
    echo "</a></td>";
    echo "<td>";
    echo "<button class='btn btn-primary delete-data-knjige' data-id='$row[0]'>Izbriši</button></td>";
    echo "</tr>";
  }
}
function readDataZanrovi()
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT * FROM zanrovi";
  $res = mysqli_query($conn, $sql);
  $field_count = mysqli_field_count($conn);
  while ($row = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['genre'] . "</td>";
    echo "<td><a href='zanroviAzuriraj.php?id=$row[0]'>";
    echo "<button id='update-data-zanrovi' class='btn btn-primary mt-2'>Ažuriraj</button>";
    echo "</a></td>";
    echo "<td><button class='btn btn-primary delete-data-zanrovi' data-id='$row[0]'>Izbriši</button></td>";
    echo "</tr>";
  }
  //3.zatvaranje konekcije
  mysqli_close($conn);
}

function readDataAutori()
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT * FROM autori";
  $res = mysqli_query($conn, $sql);
  $field_count = mysqli_field_count($conn);
  while ($row = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['author'] . "</td>";

    echo "<td><a href='autoriAzuriraj.php?id=$row[0]'>";
    echo "<button id='update-data-autori' class='btn btn-primary'>Ažuriraj</button>";
    echo "</a></td>";
    echo "<td><button class='btn btn-primary delete-data-autori' data-id='$row[0]'>Izbriši</button></td>";
    echo "</tr>";
  }
  //3.zatvaranje konekcije
  mysqli_close($conn);
}

function readDataZanr($id)
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT * FROM zanrovi WHERE id=" . $id;
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($res)) {
    echo "<div class='col-12'>";
    echo "<label>Redni broj zanra:</label>";
    echo "<input type='text' name='id' id='id' class='form-control' value='" . $row['id'] . "' readonly>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<label>Zanr:</label>";
    echo "<input type='text' name='genre' id='genre' class='form-control' value='" . $row['genre'] . "'>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<button id='update-data-zanrovi' class='btn btn-primary mt-2'>Ažuriraj";
    echo "</div>";
    echo "<script src='./scripts/updateDataZanrovi.js'></script>";
  }
  //3.zatvaranje konekcije
  mysqli_close($conn);
}

function readDataAutor($id)
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT * FROM autori WHERE id=" . $id;
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($res)) {
    echo "<div class='col-12'>";
    echo "<label>Redni broj autora:</label>";
    echo "<input type='text' name='id' id='id' class='form-control' value='" . $row['id'] . "' readonly>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<label>Autor:</label>";
    echo "<input type='text' name='author' id='author' class='form-control' value='" . $row['author'] . "'>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<button id='update-data-autori' class='btn btn-primary mt-2'>Ažuriraj";
    echo "</div>";
    echo "<script src='./scripts/updateDataAutori.js'></script>";
  }
  //3.zatvaranje konekcije
  mysqli_close($conn);
}

function readDataKnjiga($id)
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT * FROM knjige WHERE id=" . $id;
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($res)) {
    echo "<div class='col-12'>";
    echo "<label>Redni broj knjige:</label>";
    echo "<input type='text' name='id' id='id' class='form-control' value='" . $row['id'] . "' readonly>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<label>Title:</label>";
    echo "<input type='text' name='title' id='title' class='form-control' value='" . $row['title'] . "'>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<label for='autor-knjige' class='form-label'>Autor:</label>
    <select name='author' id='author' class='form-select' aria-label='Default select example'>
    <option selected disabled>Odaberite autora:</option>";
    echo readDataSelectAutori();
    echo "</select>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<label for='zanr-knjige' class='form-label'>Žanr:</label>
    <select name='genre' id='genre' class='form-select' aria-label='Default select example'>
    <option selected disabled>Odaberite žanr:</option>";
    echo readDataSelectZanrovi();
    echo "</select>";
    echo "</div>";
    echo "<div class='col-12'>";
    echo "<label>numberOfPages:</label>";
    echo "<input type='text' name='numberOfPages' id='numberOfPages' class='form-control' value='" . $row['numberOfPages'] . "'>";
    echo "</div>";
    echo "<div class='col-12'>";

    // check box ovdje
    echo "<div class='form-check'>
    <input class='form-check-input' type='checkbox' value='$row[0]' id='flex-check-procitano'>
    <label class='form-check-label for='flexCheckProcitano'>
      Pročitano
    </label>
  </div>
  <div class='form-check'>
    <input class='form-check-input' type='checkbox' value='$row[0]' id='flex-check-neprocitano'>
    <label class='form-check-label' for='flexCheckNeProcitano'>
      Nepročitano
    </label>
  </div>";

    echo "</div>";
    echo "<div class='col-12'>";
    echo "<button id='update-data-knjige' class='btn btn-primary mt-2'>Ažuriraj";
    echo "</div>";
    echo "<script src='./scripts/updateDataKnjige.js'></script>";
  }
  //3.zatvaranje konekcije
  mysqli_close($conn);
}

function readDataSelectZanrovi()
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT * FROM zanrovi";
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($res)) {
    echo "<option value='$row[0]'>" . $row[1] . "</option>";
  }
  //3.zatvaranje konekcije
  mysqli_close($conn);
}

function readDataSelectAutori()
{
  $conn = connection();
  //2.rad s bazom
  $sql = "SELECT * FROM autori";
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($res)) {
    echo "<option value='$row[0]'>" . $row[1] . "</option>";
  }
  //3.zatvaranje konekcije
  mysqli_close($conn);
}

function createData($sql)
{
  $conn = connection();
  //2.rad s bazom
  //echo $sql;
  $res = mysqli_query($conn, $sql);
  //3.zatvaranje konekcije
  mysqli_close($conn);
}
