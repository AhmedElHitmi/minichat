<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Minichat</title>
    </head>
    <body>
       <form action="minichat_post.php" method="post">
           <p>
           <label for="nom">Pseudo</label> : <input type="text" name="nom" id="nom" /><br />
           <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
           <input type="submit" value="Envoyer" />
          </p>
       </form>
       <?php
       try
       {
           $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'melissa2000');
       }
       catch(Exception $e)
       {
               die('Erreur : '.$e->getMessage());

       }
       $reponse = $bdd->query('SELECT nom, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');


       while ($donnees = $reponse->fetch())
       {
           echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
       }
       ?>
    </body>
</html>
