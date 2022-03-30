<?php

    $id = htmlspecialchars($_GET['id']);


    require_once('../../config/db.php');

    $req = $pdo->prepare("DELETE FROM etudiants WHERE id = ?");
    $param = array($id);
    $req->execute($param);

    header('location:../../index.php?page=etudiants');




?>