<?php

if(isset($_POST['submit'])){
    $login = htmlspecialchars($_POST['login']);
    $passwor = md5(htmlspecialchars($_POST['password']));

    require_once('../../config/db.php');

    $req = $pdo->prepare("SELECT * FROM comptes WHERE email = ?");
    $param = array($login);
    $req->execute($param);

    $compte = $req->fetch(PDO::FETCH_ASSOC);

    if($compte != null){
        if($compte['type'] == 'etudiant'){
            $req1 = $pdo->prepare("SELECT * FROM etudiants WHERE comptes_id = ?");
            $param = array($compte['id']);
            $req1->execute($param);
        }else{
            $req1 = $pdo->prepare("SELECT * FROM users WHERE comptes_id = ?");
            $param = array($compte['id']);
            $req1->execute($param);
        }

        $user_courant = $req1->fetch(PDO::FETCH_ASSOC);

        if($compte['password'] == $passwor){
            session_start();
            $_SESSION['role'] = $compte['type'];
            $_SESSION['photo'] = $user_courant['photo'];
            header('location:../../index.php?page=accueil');
        }
    }
}









?>