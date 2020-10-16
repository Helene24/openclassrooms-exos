<?php
require('controller/controller.php');

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'listBillets')
    {
        listBillets();
    }
    elseif ($_GET['action']== 'billet')
    {
        if (isset($_GET['id']) && $_GET['id'] > 0)
        {
            billet();
        }
        else
        {
            echo 'Erreur : aucun id de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'ajoutCommentaire')
    {
        if (isset($_GET['id']) && $_GET['id'] >0 )
        {
            if (!empty($_POST['auteur']) && !empty($_POST['commentaire']))
            {
                ajoutCommentaire($_GET['id'], $_POST['auteur'], $_POST['commentaire']);
            } 
            else
            {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else
{
    listBillets();
}
