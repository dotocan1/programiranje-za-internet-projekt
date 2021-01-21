var mysql = require('mysql');
var fs = require('fs');

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "e-library"
});

con.connect(function (err) {
    if (err) throw err;
    con.query("SELECT knjige.id, knjige.title, autori.author, zanrovi.genre, knjige.numberOfPages, knjige.statusKnjige  from knjige join zanrovi on knjige.FK_ID_zanra = zanrovi.id join autori on knjige.FK_ID_autora = autori.id", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
        jsonResult = JSON.stringify(result);
        fs.writeFile('./podaci/podaciOKnjigama.json', jsonResult, 'utf8', function (err) {
            console.log("Čitanje podataka o knjigama je izvršeno!");
        });
    });
    con.query("SELECT * from zanrovi", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
        jsonResult = JSON.stringify(result);
        fs.writeFile('./podaci/podaciOZanrovima.json', jsonResult, 'utf8', function (err) {
            console.log("Čitanje podataka o žanrovima je izvršeno!");
        });
    });
    con.query("SELECT * from autori", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
        jsonResult = JSON.stringify(result);
        fs.writeFile('./podaci/podaciOAutorima.json', jsonResult, 'utf8', function (err) {
            console.log("Čitanje podataka o autorima je izvršeno!");
        });
    });
});