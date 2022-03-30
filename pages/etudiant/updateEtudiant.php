<?php

  if(isset($_POST['submit'])){

    require_once('../../config/db.php');

    $id = htmlspecialchars($_POST['id']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $dateNais = htmlspecialchars($_POST['dateNais']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $compte_id = $_POST['compte'];
    $nomPhoto      = $_FILES["photo"]["name"] ;
    $formation_id = htmlspecialchars($_POST['formation']);
    if($nomPhoto == ""){
        $req = $pdo->prepare("UPDATE etudiants SET prenom=?, nom=?, dateNais=?, adresse=?, telephone=?, formation_id=?, comptes_id=? WHERE id=?");
        $params = array($prenom, $nom, $dateNais, $adresse, $telephone, $formation_id, $compte_id, $id);
        $req->execute($params);
    }else{
        $file_tmp_name = $_FILES["photo"]["tmp_name"];
        move_uploaded_file($file_tmp_name, "../../static/image/$nomPhoto");
        $req = $pdo->prepare("UPDATE etudiants SET prenom=?, nom=?, dateNais=?, adresse=?, telephone=?, photo=?,    formation_id=?, comptes_id=? WHERE id=?");
        $params = array($prenom, $nom, $dateNais, $adresse, $telephone, $nomPhoto, $formation_id, $compte_id, $id);
        $req->execute($params);
    }
    header('location:../../index.php?page=etudiants');

  }

?>