<?php

function M_getposts(){
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(create_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY create_date DESC LIMIT 0, 5');

    return $req;
}

function M_getpost($post_id){
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(create_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($post_id));
    $post = $req->fetch();

    return $post;
}
function getComments($post_id)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($post_id));

    return $comments;
}
function postComment($post_id, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($post_id, $author, $comment));

    return $affectedLines;
}

function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=website;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
}
function M_add_user($nom,$prenom,$adresse,$code_postal,$date_de_naissance,$adresse_mail,$pseudo,$mot_de_passe){
    $db=dbConnect();
    $hash_pwd = password_hash($mot_de_passe,PASSWORD_DEFAULT);
        $req = $db->prepare('INSERT INTO `membres`(`id`, `nom`, `prenom`, `adresse`, `code_postal`, `date_de_naissance`, `e-mail`, `pseudo`, `psswd`) 
                                VALUES (\'\',:nom,:prenom,:adresse,:code_postal,:date_naiss,:email,:logi,:psswrd)');
        $req->execute(array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adresse'=>$adresse,
            'code_postal'=>$code_postal,
            'date_naiss'=>$date_de_naissance,
            'email'=>$adresse_mail,
            'logi'=>$pseudo,
            'psswrd'=>$hash_pwd
        ));
}
function M_data_user_id($id){
    $db=dbConnect();
    //  Récupération des données de l'utilisateur via l'id
    $req = $db->prepare('SELECT * FROM membres WHERE id = :id');
    $req->execute(array(
        'id' => $id));
    $resultat = $req->fetch();
    
    return $resultat;
}
function M_login_user($pseudo,$password){  
    $db=dbConnect();
    //  Récupération de l'utilisateur et de son pass hashé
    $req = $db->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($password, $resultat['psswd']);

    if (!$resultat)
    {
        if (empty($pseudo) AND empty($password)) {
            return $erreur = "Tous les champs doivent être remplie";
        }else{
            return $erreur = "L'identifiant ou le mot de passe sont incorrect";
        }
        
    }
    else
    {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo']=$resultat['pseudo'];
            return $resultat;          
        }
        else {
            return $erreur = "L'identifiant ou le mot de passe sont incorrect";
        }
    }
}
function M_logout(){
    session_destroy();
    header("Location: index.php");
}
function M_getchat(){
    $db=dbConnect();
    $reponse = $db->query('SELECT * FROM chat ORDER BY ID desc LIMIT 0,10');
    return $reponse;
}
function M_insertChat($pseudo,$message){
    $db=dbConnect();
    $req = $db->prepare('INSERT INTO `chat`(`ID`, `Pseudo`, `chat`) VALUES (\'\', :pseudo, :chat)');
    $req -> execute(array(
        'pseudo' => $pseudo,
        'chat' => $message
    ));
}