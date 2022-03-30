<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once('../../config/db.php');
    $req = $pdo->prepare("SELECT * FROM formations WHERE id=?");
    $param = array($id);
    $req->execute($param);
    $formatiom = $req->fetch(PDO::FETCH_ASSOC);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <a href="../../index.php?page=formations" class="btn btn-secondary">Retour</a>
    </div>
    <div class="container col-md-8 md-offset-2 col-sm-12 mt-5">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Formation
            </div>
            <div class="card-body">
                <form action="updateformation.php" method="POST">
                    <div class="form-group">
                        <label for="idForm">ID : <?php echo($formatiom['id']) ?></label><br><br>
                        <input type="hidden" class="form-control" name="id" id="idForm" value="<?php echo($formatiom['id']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" name="libelle" id="libelle" value="<?php echo($formatiom['libelle']) ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>