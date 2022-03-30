<?php

  if(isset($_POST['submit'])){

    require_once('../../config/db.php');


    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $dateNais = htmlspecialchars($_POST['dateNais']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    if(!empty($_FILES) && isset($_FILES['photo'])){
      $photo=$_FILES['photo'];
      if(!empty($_FILES["photo"]["name"])){
        //nom du fichier choisi:
        $nomPhoto      = $_FILES["photo"]["name"] ;
        //nom temporaire sur le serveur:
        $file_tmp_name = $_FILES["photo"]["tmp_name"];
      }
    }
    move_uploaded_file($file_tmp_name, "../../static/image/$nomPhoto");

    //creation d'un compte pour l'etudiant
    $date = explode('-',$dateNais);
    $annee = $date[0];

    $email = strtolower($nom).strtolower($prenom).$annee.'@gmail.com';
    $password = md5(strtolower($nom).$annee);
    $type = 'admin';

    $req = $pdo->prepare("INSERT INTO comptes(email, password, type) VALUES(?, ?, ?)");
    $params = array($email, $password, $type);
    $req->execute($params);

    $req1 = $pdo->prepare("SELECT * FROM comptes WHERE email = ?");
    $param = array($email);
    $req1->execute($param);
    $compte = $req1->fetch(PDO::FETCH_ASSOC);
    //fin de la creation du compte 

    $compte_id = $compte['id'];

    $req2 = $pdo->prepare("INSERT INTO users(prenom, nom, dateNais, adresse, telephone, photo, comptes_id) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $params2 = array($prenom, $nom, $dateNais, $adresse, $telephone, $nomPhoto, $compte_id);
    $req2->execute($params2);

    header('location:../../index.php?page=utilisateurs');

  }

?>