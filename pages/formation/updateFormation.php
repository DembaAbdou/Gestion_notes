<?php

    if(isset($_POST['submit'])){

        $id = htmlspecialchars($_POST['id']);
        $libelle = htmlspecialchars($_POST['libelle']);


        require_once('../../config/db.php');

        $req = $pdo->prepare("UPDATE formations SET libelle = ? WHERE id = ?");
        $param = array($libelle, $id);
        $req->execute($param);

        header('location:../../index.php?page=formations');

    }





?>