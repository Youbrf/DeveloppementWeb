<?php
session_start();

require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'accueil') {
            C_Accueil();
        }
        elseif ($_GET['action'] == 'Registration') {
            if (isset($_SESSION['id'])){
                header("Location: index.php?action=Login");
            }else {
                C_Registration();
            }
            
        }
        elseif ($_GET['action'] == 'Login') {
            if (isset($_POST['login'])) {
                C_Login_User($_POST['pseudo'],$_POST['password']);
            }elseif (isset($_SESSION['id'])) {
                C_Data_User_id($_SESSION['id']);
            }else {
                C_login();
            }
        }
        elseif ($_GET['action'] == 'Logout') {
            C_Logout();
        }
        elseif ($_GET['action'] == 'AddUser') {
            if (strcmp($_POST['mot_de_passe'],$_POST['confirmation_mot_de_passe'])==0) {
                if (!empty($_POST['nom']) 
                    && !empty($_POST['prenom']) 
                    && !empty($_POST['adresse_mail']) 
                    && !empty($_POST['pseudo']) 
                    && !empty($_POST['mot_de_passe'])){
                C_Add_User($_POST['nom'],
                            $_POST['prenom'], 
                            $_POST['adresse'], 
                            $_POST['code_postal'], 
                            $_POST['date_de_naissance'], 
                            $_POST['adresse_mail'], 
                            $_POST['pseudo'], 
                            $_POST['mot_de_passe']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }else {
                throw new Exception('Les mots de passes ne sont pas identique !');
            }
            
        }
        elseif ($_GET['action'] == 'Chat') {
            if (isset($_POST['insertchat'])) {
                C_Insert_Chat($_SESSION['pseudo'],$_POST['message']);
                C_Chat();
            }else {
                C_Chat();
            }
            
        }
        elseif ($_GET['action'] == 'Blog') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        C_Accueil();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
