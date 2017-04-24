<!DOCTYPE html>
<html>
  <head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <?php
    session_start();

    #connexion bdd
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ppe', 'root', '');
    #verif contenu formulaire
    if(isset($_POST['submitconnect']))
    {
      $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
      $mdpconnect = sha1($_POST['mdpconnect']);
      if(!empty($_POST['pseudoconnect']) AND !empty($_POST['mdpconnect']))
      {
        $requser = $bdd->prepare("SELECT * FROM infoclient WHERE user = ? AND mdp = ?");
        $requser->execute(array($pseudoconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
          $userinfo = $requser->fetch();
          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['pseudo'] = $userinfo['user'];
          $_SESSION['mdp'] = $userinfo['mdp'];
          header("Location: main.php?id=".$_SESSION['id']);
        }
        else {
          $erreur = "Nom d'utilisateur ou mot de passe incorrect...";
        }
      }
      else {
        $erreur= "Tous les champs doivent être complétés !";
      }
    }
    ?>
  </head>


  <body>
    <div align="center">
      <h1>Connexion</h1>

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
      <form method="POST" action="">
        <table>
          <tr>
            <td align="right">
              <label for="pseudo">Pseudo :</label>
            </td>
            <td align="right">
              <input type="text" placeholder="Votre pseudo" id="pseudoconnect" name="pseudoconnect" value="<?php if(isset($_POST['pseudoconnect'])){ echo $_POST['pseudoconnect']; }?>"/>
            </td>
          </tr>
          <tr>
            <td align="right">
              <label for="mdp">Mot de passe :</label>
            </td>
            <td align="right">
              <input type="password" placeholder="Votre mot de passe" id="mdpconnect" name="mdpconnect" />
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
            </br>
              <input type="submit" name="submitconnect" value="Se connecter" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </br></br></br>
    <button onclick="window.location.href='inscription.php'">S'inscrire</button>
  </body>
</html>
