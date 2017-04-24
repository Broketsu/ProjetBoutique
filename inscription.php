<!DOCTYPE html>
<html>
  <head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <?php
    #connexion bdd
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ppe', 'root', '');
    #verif contenu formulaire
    if(isset($_POST['submit']))
    {
      #formulaire incomplet
      if(!empty($_POST['user']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['mail']) AND !empty('ddn') AND !empty($_POST['sexe']) AND !empty($_POST['geo']))
      {
        $user = htmlspecialchars($_POST['user']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        $mail = $_POST['mail'];
        $mail2 = $_POST['mail2'];
        $sexe = $_POST['sexe'];
        $geo = $_POST['geo'];

        #pseudo trop long
        $userlength = strlen($user);

        if($userlength <= 255)
        {
          #verif pseudo unique
          $verifuser = $bdd->prepare("SELECT * FROM infoclient WHERE user = ?");
          $verifuser->execute(array($user));
          $userexist = $verifuser->rowCount();
          if($userexist == 0)
          {
            #verif mail
            if($mail == $mail2)
            {
              #verif mail unique
              $verifmail = $bdd->prepare("SELECT * FROM infoclient WHERE mail = ?");
              $verifmail->execute(array($mail));
              $mailexist = $verifmail->rowCount();
              if($mailexist == 0)
              {
                #verif mot de passe
                if($mdp == $mdp2)
                {
                  #creation ddn
                  $ddn=$_POST['jour']."".$_POST['mois']."".$_POST['annee'];

                  $insertmbr = $bdd->prepare("INSERT INTO infoclient(user, mdp, mail, ddn, sexe, geo) VALUES(?, ?, ?, ?, ?, ?)");
                  $insertmbr->execute(array($user, $mdp, $mail, $ddn, $sexe, $geo));
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
              $erreur = "Vos adresses mail ne se correspondent pas !";
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
              <label for="user">Pseudo :</label>
            </td>
            <td align="right">
              <input type="text" placeholder="Votre pseudo" id="user" name="user" value="<?php if(isset($_POST['user'])){ echo $_POST['user']; }?>" />
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
            <td align="right">
              <label for="mail">Adresse mail :</label>
            </td>
            <td align="right">
              <input type="mail" placeholder="Votre e-mail" id="mail" name="mail" value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; }?>"/>
            </td>
          </tr>
          <tr>
            <td align="right">
              <label for="mail2">Confirmation :</label>
            </td>
            <td align="right">
              <input type="text" placeholder="Confirmez votre e-mail" id="mail2" name="mail2" value="<?php if(isset($_POST['mail2'])){ echo $_POST['mail2']; }?>"/>
            </td>
          </tr>
          <tr>
            <td align="right">
              <label for="ddn">Date de naissance :</label>
            </td>
            <td align="right">
              <select name="jour">
          		<?php $jour= 01;
          			while($jour<=31){
          		?>
          		  <option value="<?php echo $jour ?>"><?php echo $jour ?></option>
          		<?php
          			$jour = $jour +1; }
          		?>
          		</select>
              <select name="mois">

          		  <option value="janvier">janvier</option>
          		  <option value="fevrier">fevrier</option>
          		  <option value="mars">mars</option>
          		  <option value="avril">avril</option>
          		  <option value="mai">mai</option>
          		  <option value="juin">juin</option>
          		  <option value="juillet">juillet</option>
          		  <option value="août">août</option>
          		  <option value="septembre">septembre</option>
          		  <option value="octobre">octobre</option>
          		  <option value="novembre">novembre</option>
          		  <option value="decembre">decembre</option>

          		</select>
              <select name = "annee">
          		<?php $annee= 2017;
          			while($annee>=1900){
          		?>
          		  <option value="<?php echo $annee ?>"><?php echo $annee ?></option>
          		<?php
          			$annee = $annee - 1; }
          		?>
          		</select>
            </td>
          </tr>
          <tr>
            <td align="right">
              <label for="mdp2">Sexe :</label>
            </td>
            <td align="right">
              Homme : <input type="radio" name="sexe" value="homme" checked>
            </td>
          </tr>
          <tr>
            <td align="right">

            </td>
            <td align="right">
              Femme : <input type="radio" name="sexe" value="femme">
            </td>
          </tr>
          <tr>
            <td align="right">
              <label for="mdp2">Localisation :</label>
            </td>
            <td align="right">
              <input type="text" placeholder="Votre ville" id="geo" name="geo" value="<?php if(isset($_POST['geo'])){ echo $_POST['geo']; }?>"/>
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
    <button onclick="window.location.href='connexion.php'">Se connecter</button>
  </body>
</html>
