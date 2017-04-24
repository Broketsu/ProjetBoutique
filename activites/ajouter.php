<?php
include ('connexion.php');

$db = new connexion();
$db->connect("127.0.0.1","root","","ppe");
?>
<form action = "ajout.php" method="post">
Date : <input type="text" name="date">
Sport : <input type="text" name="sport">
Heure : <input type="text" name="heure">
Lieu : <input type="text" name="lieu">

<input type = "submit" name="valider" value = "Valider">

</form>
