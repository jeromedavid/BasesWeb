
<?php

$server = "localhost";
$dbname = "blogv1";
$user = "blogv1";
$pwd = "pwdv1";

/*
$link = mysql_connect($server, $user, $pwd)
    or die("Impossible de se connecter : " . mysql_error());
echo 'Connexion réussie';
mysql_close($link);
*/


//PDO
$dsn = 'mysql:dbname='.$dbname.';host='.$server.';charset=utf8';

try {
    $dbh = new PDO($dsn, $user, $pwd);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //on défini la lecture du fetch en tableau associatif



} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

//DETRUIRE LES AUTRES VARIABLES
unset($server,$dbname,$user,$pwd,$dsn);



