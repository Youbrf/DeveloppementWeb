<?php

require('model/frontend.php');

function listPosts()
{
    $posts = M_getposts();

    require('view/frontend/blog.php');
}

function post()
{
    $post = M_getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/frontend/blog_comments.php');
}
function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


function C_Accueil(){
    require('view/frontend/accueil.php');
}
function C_Registration(){
    require('view/frontend/registration.php');
}
function C_Add_User($nom,$prenom,$adresse,$code_postal,$date_de_naissance,$adresse_mail,$pseudo,$mot_de_passe){
    M_add_user($nom,$prenom,$adresse,$code_postal,$date_de_naissance,$adresse_mail,$pseudo,$mot_de_passe);
    require('view/frontend/profil.php');
}
function C_Login(){
    require('view/frontend/login.php');
}
function C_Data_User_id($id){
    $data=M_data_user_id($id);
    require('view/frontend/user_profil.php');
}
function C_Login_User($pseudo,$password){
    $data=M_login_user($pseudo,$password);
    if (is_string($data)) {
        require('view/frontend/login.php');
    }else{
        require('view/frontend/user_profil.php');
    }
    
}
function C_Logout(){
    M_logout();
}
function C_Chat(){
    $reponse=M_getchat();
    require('view/frontend/chat.php');
}
function C_Insert_Chat($pseudo,$message){
    M_insertchat($pseudo,$message);
}
