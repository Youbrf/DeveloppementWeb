<?php
require('model/frontend.php');
function C_Accueil(){
    require('view/frontend/accueil.php');
}
// add and register users + login
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
// Modify data users
function C_View_Mod_Adresse($id){
    $data=M_data_user_id($id);
    require('view/frontend/updateUser/modadresse.php');
}
function C_Modify_adresse($newAdresse,$id){
    if (empty($newAdresse)) {
        $erreur="Veuillez entrer une adresse valide ";
        $data=M_data_user_id($id);
        require('view/frontend/updateUser/modadresse.php');
    }else {
        M_modify_adresse($newAdresse,$id);
        C_Data_User_id($id);
    }
    
}
function C_View_Mod_cp($id){
    $data=M_data_user_id($id);
    require('view/frontend/updateUser/modcp.php');
}
function C_Modify_cp($newcp,$id){
    if (empty($newcp) or !is_int($newcp)) {
        $erreur="Veuillez entrer un code postal valide ";
        $data=M_data_user_id($id);
        require('view/frontend/updateUser/modcp.php');
    }else {
        M_modify_cp($newcp,$id);
        C_Data_User_id($id);
    }
    
}
function C_View_Mod_Email($id){
    $data=M_data_user_id($id);
    require('view/frontend/updateUser/modemail.php');
}
function C_Modify_Email($newEmail,$id){
    if (empty($newEmail)) {
        $erreur="Veuillez entrer un e-mail valide ";
        $data=M_data_user_id($id);
        require('view/frontend/updateUser/modemail.php');
    }else {
        M_modify_email($newEmail,$id);
        C_Data_User_id($id);
    }
    
}
function C_View_Mod_Pwd($id){
    $data=M_data_user_id($id);
    require('view/frontend/updateUser/modpwd.php');
}
function C_Modify_Pwd($newPwd,$oldPwd,$id){
    if (strcmp($newPwd,$oldPwd)==0) {
        M_modify_pwd($newPwd,$id);
        C_Data_User_id($id);
    }else {
        $erreur="Vous avez introduis différent mot de passe, Réessayer";
        $data=M_data_user_id($id);
        require('view/frontend/updateUser/modpwd.php');
    }    
}
// Avatar
function C_View_Mod_Avatar($id){
    $data=M_data_user_id($id);
    require('view/frontend/updateUser/modavatar.php');
}
function C_Modify_Avatar($newAvatar,$id){
    if (empty($newAvatar)) {
        $data=M_data_user_id($id);
        require('view/frontend/updateUser/modavatar.php');
    }else {
        $erreur=M_modify_avatar($newAvatar);
        if (empty($erreur)) {
            C_Data_User_id($id);
        }else {
            $data=M_data_user_id($id);
            require('view/frontend/updateUser/modavatar.php');
        }
    }
    
}


// Chat
function C_Chat(){
    $reponse=M_getchat();
    require('view/frontend/chat.php');
}
function C_Insert_Chat($pseudo,$message){
    M_insertchat($pseudo,$message);
}
// display posts
function C_List_Posts(){
    $posts = M_get_posts();
    require('view/frontend/blog.php');
}
function C_Search_Posts($title){
    $posts = M_search_billet($title);
    require('view/frontend/blog.php');
}
function C_Post(){
    $post = M_get_post($_GET['id']);
    $comments = M_get_comments($_GET['id']);

    require('view/frontend/blog_comments.php');
}
function C_Add_Comment($postId, $author, $comment){
    $affectedLines = M_post_comment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}