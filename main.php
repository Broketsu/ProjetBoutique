<!DOCTYPE html>
<html>
  <head>
    <title>Bienvenue</title>
    <meta charset="utf-8">
    <?php
    session_start();

    #connexion bdd
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ppe', 'root', '');

    if (isset($_GET['id']) AND $_GET['id'] > 0)
    {
      $id = $_GET['id'];
      $requser = $bdd->prepare('SELECT * FROM infoclient WHERE id = ?');
      $requser->execute(array($id));
      $userinfo = $requser->fetch();
    }

    ?>
  </head>


  <body>
    <div align="center">
      <h1>Bienvenue sur le site officiel de la M2L !</h1>
    </div>


      <?php
      #vérification de la véracité de la connection de l'utilisateur
      if (isset($userinfo))
      {
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
        {
          ?>
        <div>
          <h2>Bonjour <?php echo $userinfo['user']; ?></h2>
          <a href='#'>Éditer mon profil</a>
        </br>
          <a href='deconnexion.php'>Se déconnecter</a>
        </br>
        </div>
          <!--écrire ici le code pour poster et rejoindre un évènement-->
          <a href='activites/index.php?id=<?php echo $id ?>'>Rechercher une activité</a>
          <?php
        }
      }else {?>
          <a href='inscription.php'>S'inscrire</a>
        </br>
          <a href='connexion.php'>Se connecter</a>
        <?php
        }
       ?>

      <?php
      #messages
      if(isset($erreur))
      {
        echo '<font color="red">'.$erreur."</font>";
      }
      if(isset($succes))
      {
        echo '<font color="green">'.$succes."</font>";
      }
      ?>

    </br></br>

    </div>
  </body>
</html>
