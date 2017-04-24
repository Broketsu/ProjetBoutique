<?php
include ('connexion.php');

$db = new connexion();
$db->connect("127.0.0.1","root","","ppe");

$id=$_GET["id"];


$modifsport=$_POST['modifsport'];
$modifheure=$_POST['modifheure'];
$modiflieu=$_POST['modiflieu'];

$sql = 'UPDATE activite SET sport="'.$modifsport.'", heure="'.$modifheure.'", lieu="'.$modiflieu.'" WHERE no='.$id;

$db-> sql($sql);

header ("Location: index.php?b=2");
