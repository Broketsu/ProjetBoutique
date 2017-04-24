<?php
include ('connexion.php');

$db = new connexion();
$db->connect("127.0.0.1","root","","ppe");

$id=$_GET["id"];


$sql = 'DELETE FROM activite WHERE no='.$id;

$db-> sql($sql);

header ("Location: index.php?b=3");
