<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Activités M2L</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<script language="javascript">
	function checkMe() {
		if (confirm("Etes-vous sûr(e) ?")) {
			return true;
		} else {
			return false;
		}
	}
	</script>

</head>
<body>
	<?php

	include ('connexion.php');

	$db = new connexion();
	$db->connect("127.0.0.1","root","","ppe");

	$res1 = $db->fetch("SELECT* FROM activite ORDER BY no asc");

	?>

	<h1>Liste des activités</h1>
	<?php
	if(isset($_GET['b']))
	{
		$b = $_GET["b"];
		if ($b==1) {?>
			<div class="alert alert-success" role="alert">Votre activité a bien été ajoutée !</div><?php
		}else{
			if ($b==2){?>
				<div class="alert alert-info" role="alert">L'activité a bien été éditée.</div><?php
			}else{
				if($b==3){?>
					<div class="alert alert-danger" role="alert">L'activité a été supprimée avec succès.</div><?php
				}
			}
		}
	}
	?>
	<a href="ajouter.php">Ajouter</a>

	<TABLE BORDER="1"; style="width:100%; text-align:center">
		<TR>
			<TH> Date </TH>
			<TH> Description </TH>
			<TH> Action </TH>
		</TR> <?php

		foreach($res1 as $row){
$id = $row["no"];
			?>
			<TR>
				<TD style="width:5%"> <?php $date=$row["date"]; echo $date ?> </TD>
				<TD> <?php $sport= $row["sport"]; echo $sport; $heure= $row["heure"]; echo $heure; $lieu= $row["lieu"]; echo $lieu ?> </TD>
				<TD style="width:10%">
					<?php
					$id=$_GET["id"];
		        if(isset($_SESSION['id']) AND $id == $_SESSION['id'])
		        {
		          ?>
					<a href="edit.php?id=<?php echo "$id"?>&sport=<?php echo "$sport"?>&heure=<?php echo "$heure"?>&lieu=<?php echo "$lieu"?>">Editer</a> <a href="delete.php?id=<?php echo "$id"?>" onClick="return checkMe()">Supprimer</a>
					<?php
				}else {?>
					<a href='#'>Participer</a>
				<?php
				}
			 ?>
				</TD>
			</TR>
			<?php
		}
		?>
	</TABLE>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
