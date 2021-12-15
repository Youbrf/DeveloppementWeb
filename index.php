<?php
require_once "model/Product.class.php";
session_start();

require('controller/frontend.php');
require_once "controller/ProductControllers.class.php";
$ProductController= new ProductControllers;

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
            if (isset($_POST['search'])) {
                C_Search_Posts($_POST['rbillet']);
            }else {
                C_List_Posts();
            }
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                C_Post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    C_Add_Comment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
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
        // modification user
        elseif ($_GET['action'] == 'Madresse') {
            if (isset($_POST['Modify'])) {
                C_Modify_adresse($_POST['adresse'],$_SESSION['id']);
            }else {
                C_View_Mod_Adresse($_SESSION['id']);
            }
        }
        elseif ($_GET['action'] == 'Mcp') {
            if (isset($_POST['Modify'])) {
                C_Modify_cp(intval($_POST['cp']),$_SESSION['id']);
            }else {
                C_View_Mod_cp($_SESSION['id']);
            }
        }
        elseif ($_GET['action'] == 'Memail') {
            if (isset($_POST['Modify'])) {
                C_Modify_Email($_POST['adresse_mail'],$_SESSION['id']);
            }else {
                C_View_Mod_Email($_SESSION['id']);
            }
        }
        elseif ($_GET['action'] == 'Mpwd') {
            if (isset($_POST['Modify'])) {
                C_Modify_Pwd($_POST['mot_de_passe'],$_POST['confirmation_mot_de_passe'],$_SESSION['id']);
            }else {
                C_View_Mod_Pwd($_SESSION['id']);
            }
        }
        elseif ($_GET['action'] == 'Products') {
            if (isset($_GET['id'])) {
                $ProductController->C_addPanier();
                $ProductController->productsShowAll();
            }else {
                $ProductController->productsShowAll();
            }
        }
        //panier
        elseif ($_GET['action'] == 'Panier') {
                $ProductController->C_showPanier();
        }
    }
    else {
        C_Accueil();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
