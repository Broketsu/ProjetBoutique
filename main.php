<!DOCTYPE html>
<html>
  <head>
    <title>Bienvenue</title>
    <meta charset="utf-8">
    <?php
    session_start();

    #connexion bdd
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=boutique', 'root', '');

    if (isset($_GET['id']) AND $_GET['id'] > 0)
    {
      $id = $_GET['id'];
      $requser = $bdd->prepare('SELECT * FROM client WHERE id = ?');
      $requser->execute(array($id));
      $userinfo = $requser->fetch();

    ?>
  </head>


  <body>
    <div align="center">
      <h2>Bonjour <?php echo $userinfo['nom']; ?></h2>


      <?php
      #vérification de la véracité de la connection de l'utilisateur
      if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
      {
        ?>
        <a href='#'>Éditer mon profil</a>
      </br>
        <a href='deconnexion.php'>Se déconnecter</a>
        <?php #écrire ici le code pour poster et rejoindre un évènement
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
  <?php
} ?>
</html>
