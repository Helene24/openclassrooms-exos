<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon blog</title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Mon blog !!</h1>
    <p><a href="../index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($billet['titre']) ?>
            <em>le <?= $billet['date_creation_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($billet['contenu'])) ?>
        </p>
    </div>


    <h2>Commentaires</h2>

    <?php
    while ($commentaire = $commentaires->fetch()) {
    ?>
        <p><strong><?= htmlspecialchars($commentaire['auteur']) ?></strong> le <?=
                                                                                    $commentaire['date_commentaire_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($commentaire['commentaire'])) ?></p>
    <?php
    } //Fin de la boucle des commentaires
    ?>

    <form action="index.php?action=ajoutCommentaire&amp;id=<?= $billet['id'] ?>" method="post">
        <div>
            <label for="auteur">Auteur</label><br />
            <input type="text" id="auteur" name="auteur" />
        </div>
        <div>
            <label for="commentaire">Commentaire</label><br />
            <textarea id="commentaire" name="commentaire"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>

    </form>
</body>

</html>