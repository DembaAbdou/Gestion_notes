<?php

    if(isset($_POST['submit'])){


        $libelle = htmlspecialchars($_POST['libelle']);


        require_once('../../config/db.php');

        $req = $pdo->prepare("INSERT INTO formations(libelle) VALUE(?)");
        $param = array($libelle);
        $req->execute($param);

        header('location:../../index.php?page=formations');

    }





?>