<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once('../../config/db.php');
    $req = $pdo->prepare("SELECT * FROM etudiants WHERE id=?");
    $param = array($id);
    $req->execute($param);
    $etudiant = $req->fetch(PDO::FETCH_ASSOC);
    $req1=$pdo->prepare("SELECT * FROM formations");
    $req1->execute();
    $req2 = $pdo->prepare("SELECT * FROM formations WHERE id=?");
    $param1 = array($etudiant['formation_id']);
    $req2->execute($param1);
    $form = $req2->fetch(PDO::FETCH_ASSOC);
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
        <a href="../../index.php?page=etudiants" class="btn btn-secondary">Retour</a>
    </div>
    <div class="container col-md-8 md-offset-2 col-sm-12 mt-5">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Etudiant
            </div>
            <div class="card-body">
                <form method="POST" action="updateEtudiant.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="idEt">ID : <?php echo($etudiant['id']) ?></label><br><br>
                        <input type="hidden" value="<?php echo($etudiant['id']) ?>" name="id" class="form-control" id="idEt" required> 
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" value="<?php echo($etudiant['prenom']) ?>" name="prenom" class="form-control" id="prenom" placeholder="Votre prenom" required> 
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" value="<?php echo($etudiant['nom']) ?>" name="nom" class="form-control" id="nom" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="dateNais">Date de Naissance</label>
                        <input type="date" value="<?php echo($etudiant['dateNais']) ?>" name="dateNais" class="form-control" id="dateNais" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" value="<?php echo($etudiant['adresse']) ?>" name="adresse" class="form-control" id="adresse" placeholder="Votre adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="teleph">Telephone</label>
                        <input type="text" value="<?php echo($etudiant['telephone']) ?>" name="telephone" class="form-control" id="teleph" placeholder="Votre numero de telephone">
                    </div>
                    <div class="form-group">
                        <label>Formation</label>
                        <select class="form-control" name="formation">
                            <option selected value="<?php echo($etudiant['formation_id']) ?>"><?php echo($form['libelle']) ?></option>
                            <?php while($forma = $req1->fetch()){ ?>
                                <option value="<?php echo($forma['id']) ?>"><?php echo($forma['libelle']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="compte" value="<?php echo($etudiant['comptes_id']) ?>">
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <img src="../../static/image/<?php echo($etudiant['photo']);?>" alt="img" heigth="90" widht="90">
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