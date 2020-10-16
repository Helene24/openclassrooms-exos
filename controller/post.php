<?php
require('../modele/modele.php');

if (isset($_GET['id']) && $_GET['id'] > 0)
{
    $billet = getBillet($_GET['id']);
    $commentaires = getCommentaires($_GET['id']);
    require('../vu/postVu.php');
}
else
{
    echo 'Erreur : aucun id de billet envoyé';
}
