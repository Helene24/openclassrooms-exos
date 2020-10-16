<?php

require('modele/modele.php');

function listBillets()
{
    $req = getBillets();

    require('vu/listBilletsVu.php');
}

function billet()
{
    $billet = getBillet($_GET['id']);
    $commentaires = getCommentaires($_GET['id']);
    require('vu/postVu.php');
}

function ajoutCommentaire($billetId, $auteur ,$commentaire)
{
   $ligneSup =  postCommentaires($billetId, $auteur ,$commentaire);
   if ($ligneSup === false)
   {
       die('Impossible d\'ajouter le commentaire! ');
   }
   else
   {
       header('Location: index.php?action=billet&id=' . $billetId);
   }
}