<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Minichat</title>
    </head>
    <body>
    <?php
      try
      {
          $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'melissa2000');
      }
      catch(Exception $e)
      {
              die('Erreur : '.$e->getMessage());
      }


      $req = $bdd->prepare('INSERT INTO minichat (nom, message) VALUES(?, ?)');

      $req->execute(array($_POST['nom'], $_POST['message']));

      $reponse = $bdd->query('SELECT nom, message FROM minichat ORDER BY id DESC LIMIT 0, 10');
      while ($donnees = $reponse->fetch())
      {
          echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';

      }

      $reponse->closeCursor();

      header('Location: minichat.php');

      ?>
    </body>
</html>
