<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog !!</title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
<?php $title = 'Blog'; ?>
<?php ob_start(); ?>
<h1>Mon Blog</h1>
<p>Derniers billets du blog :</p>

<?php
//on fait une boucle: on créé $donnees dans laquelle on applique la requete avec fetch
//fetch= ligne par ligne

while ($donnees = $req->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?php 
            //on affiche le titre et la date de création du billet
            //htmlspecialchars=sécurité
            echo htmlspecialchars($donnees['titre']);?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
            //On affiche le contenu du billet
            //nl2br= convertit les retours à la ligne en <br />
            echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
            <br />
            <em><a href="index.php?action=billet&amp;id=<?php echo $donnees['id']; ?>">Commentaires</a></em>
        </p>
    </div>
    <?php
}//Fin de la boucle des billets
$req->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
</body>
</html>