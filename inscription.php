<!DOCTYPE html>
<html>
  <head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <?php
    #connexion bdd
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=boutique', 'root', '');
    #verif contenu formulaire
    if(isset($_POST['submit']))
    {
      #incomplet
      if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
      {
        #pseudo trop long
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);

        $pseudolength = strlen($pseudo);

        if($pseudolength <= 255)
        {
          #verif pseudo unique
          $verifpseudo = $bdd->prepare("SELECT * FROM client WHERE nom = ?");
          $verifpseudo->execute(array($pseudo));
          $pseudoexist = $verifpseudo->rowCount();
          if($pseudoexist == 0)
          {
            #verif mail unique
            if($mailexist == 0)
            {
              #verif mot de passe
              if($mdp == $mdp2)
              {
                $insertmbr = $bdd->prepare("INSERT INTO client(nom, password) VALUES(?, ?)");
                $insertmbr->execute(array($pseudo, $mdp));
                $succes = "Votre compte à bien été créé ! ";

              }
              else {
                $erreur = "Vos mots de passe ne se correspondent pas !";
              }
            }
            else {
              $erreur = "Votre e-mail est déjà utilisé !";
            }
          }
          else {
            $erreur = "Nom d'utilisateur déjà utilisé !";
          }
        }
        else {
          $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
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
      <h1>Inscription</h1>

      <?php
      #messages
      if(isset($erreur))
      {
        echo '<font color="red">'.$erreur."</font>";
      }
      if(isset($succes))
      {
        echo '<font color="green">'.$succes."</font>";
        ?> A présent, vous pouvez vous
        <a href = "login.php">connecter</a> !
        <?php
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
              <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" />
            </td>
          </tr>
          <tr>
            <td align="right">
              <label for="mdp">Mot de passe :</label>
            </td>
            <td align="right">
              <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
            </td>
          </tr>
          <tr>
            <td align="right">
              <label for="mdp2">Confirmation :</label>
            </td>
            <td align="right">
              <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
            </br>
              <input type="submit" name="submit" value="S'inscrire" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </br></br></br>
    <button onclick="window.location.href='login.php'">Se connecter</button>
  </body>
</html>
