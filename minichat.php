<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
       <form action="minichat_post.php" method="post">
           <p>
           <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
           <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
           <input type="submit" value="Envoyer" />
          </p>
       </form>
       <?php
       try
       {
       	// connexion bdd minichat
           $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'melissa2000');
       }
       catch(Exception $e)
       {
       	// En cas d'erreur, on affiche un message et on arrête tout
               die('Erreur : '.$e->getMessage());

       }
       $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
       while ($donnees = $reponse->fetch())
       {
           echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
       }




    </body>
</html>
