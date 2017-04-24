<?php
include ('connexion.php');

$db = new connexion();
$db->connect("127.0.0.1","root","","ppe");

$id=$_GET["id"];
$sport=$_GET["sport"];
$heure=$_GET["heure"];
$lieu=$_GET["lieu"];?>

<form action = "traitement.php?id=<?php echo "$id"?>" method="post">
<input type="text" value="<?php echo "$sport"?>" name="modifsport">
<input type="text" value="<?php echo "$heure"?>" name="modifheure">
<input type="text" value="<?php echo "$lieu"?>" name="modiflieu">

<input type = "submit" name="valider" value = "Valider">

</form>
