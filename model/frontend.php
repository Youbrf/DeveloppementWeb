<?php

function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=website;charset=utf8', 'root', '');
    return $db;
}

function add_user($nom,$prenom,$adresse,$code_postal,$date_de_naissance,$adresse_mail,$pseudo,$mot_de_passe){
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