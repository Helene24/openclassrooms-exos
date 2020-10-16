<?php

function Connexion()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getBillets()
{
    $bdd = Connexion();

    //Récupération des 5 derniers billets avec requête query
    //on met dans $req l'appel à la base de données qui fait la requete
    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y
    à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0 ,5');
    return $req;
}

function getBillet($billetId)
{
    $bdd = Connexion();

//Récupération des billets avec requête préparée et fetch
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à
    %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
    $req->execute(array($billetId));
    $billet = $req->fetch();
    return $billet;
}

function getCommentaires($billetId)
{
    $bdd = Connexion();

    $commentaires = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y
    à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? 
    ORDER BY date_commentaire');
    $commentaires->execute(array($billetId));
    return $commentaires;
}

function postCommentaires($billetId, $auteur ,$commentaire)
{
    $bdd = Connexion();

    $com = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire,
    date_commentaire) VALUES(:billet, :auteur, :commentaire, NOW())');
    $com->bindValue(':billet', $billetId, PDO::PARAM_INT);
    $com->bindValue(':auteur', $auteur, PDO::PARAM_STR);
    $com->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
    $ligneSup= $com->execute();
    return $ligneSup;
}

