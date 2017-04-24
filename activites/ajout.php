<?php
include ('connexion.php');

$db = new connexion();
$db->connect("127.0.0.1","root","","ppe");



$date=$_POST['date'];
$sport=$_POST['sport'];
$heure=$_POST['heure'];
$lieu=$_POST['lieu'];

$sql = 'INSERT INTO activite (no, sport, date, heure, lieu) VALUES (null, "'.$sport.'", "'.$date.'","'.$heure.'","'.$lieu.'")';

$db-> sql($sql);

header ("Location: index.php?b=1");
