<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once('../../config/db.php');
    $req = $pdo->prepare("SELECT * FROM users WHERE id=?");
    $param = array($id);
    $req->execute($param);
    $user = $req->fetch(PDO::FETCH_ASSOC);
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
        <a href="../../index.php?page=users" class="btn btn-secondary">Retour</a>
    </div>
    <div class="container col-md-8 md-offset-2 col-sm-12 mt-5">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit User
            </div>
            <div class="card-body">
                <form method="POST" action="updateUser.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="idEt">ID : <?php echo($user['id']) ?></label><br><br>
                        <input type="hidden" value="<?php echo($user['id']) ?>" name="id" class="form-control" id="idEt" required> 
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" value="<?php echo($user['prenom']) ?>" name="prenom" class="form-control" id="prenom" placeholder="Votre prenom" required> 
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" value="<?php echo($user['nom']) ?>" name="nom" class="form-control" id="nom" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="dateNais">Date de Naissance</label>
                        <input type="date" value="<?php echo($user['dateNais']) ?>" name="dateNais" class="form-control" id="dateNais" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" value="<?php echo($user['adresse']) ?>" name="adresse" class="form-control" id="adresse" placeholder="Votre adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="teleph">Telephone</label>
                        <input type="text" value="<?php echo($user['telephone']) ?>" name="telephone" class="form-control" id="teleph" placeholder="Votre numero de telephone">
                    </div>
                    <input type="hidden" name="compte" value="<?php echo($user['comptes_id']) ?>">
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <img src="../../static/image/<?php echo($user['photo']);?>" alt="img" heigth="90" widht="90">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>