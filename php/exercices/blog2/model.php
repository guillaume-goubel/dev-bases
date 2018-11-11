<?php
function getBillets()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $db->query('SELECT id, names, contents, DATE_FORMAT(posts_dates, \'%d/%m/%Y à %Hh%i\') AS posts_dates_fr FROM billets ORDER BY posts_dates DESC LIMIT 0, 5');

    return $req;
}


function getPost($postId)
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $db->prepare('SELECT id, names, content, DATE_FORMAT(posts_dates, \'%d/%m/%Y à %Hh%i\') AS posts_dates_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}


