<?php

require_once('./config/authorisation.php');
require_once('./config/roleUtilisateur.php');
$req = $pdo->prepare("SELECT * FROM users");
$req->execute();

?>
<div class="row">
    <div class="container mt-5 w-100">
        <button type="button" class="btn btn-secondary float-right font-weight-bold" data-toggle="modal" data-target="#exampleModal">
            New User
        </button>
    </div>
    <div class="mt-3 w-100">
        <div class="card">
            <div class="card-header text-center">
                <h2>List des Utilisateurs</h2>
            </div>
            <div class="card-body">
                
                <table class="table table-striped">
                    <thead class="text-white" style="background: rgb(89, 138, 89) !important;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">PRENOM</th>
                            <th scope="col">NOM</th>
                            <th scope="col">ADRESSE</th>
                            <th scope="col">TELEPHONE</th>
                            <th scope="col">PHOTO</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($user = $req->fetch()){ ?>
                            <tr>
                                <td><?php echo($user['id']) ?></td>
                                <td><?php echo($user['prenom']) ?></td>
                                <td><?php echo($user['nom']) ?></td>
                                <td><?php echo($user['adresse']) ?></td>
                                <td><?php echo($user['telephone']) ?></td>
                                <td><img src="./static/image/<?php echo($user['photo']) ?>" class="rounded" alt="imageEt" width="50" height="50"></td>
                                <td>
                                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer');" href="./pages/utilisateur/deleteUser.php?id=<?php echo($user['id']) ?>" class="text-danger mr-2"><i class="fa fa-trash"></i></a>
                                    <a href="./pages/utilisateur/editUser.php?id=<?php echo($user['id']) ?>" class="mr-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Saisie Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./pages/utilisateur/ajouterUser.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre prenom" required> 
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Votre adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="dateNais">Date de Naissance</label>
                        <input type="date" name="dateNais" class="form-control" id="dateNais" required>
                    </div>
                    <div class="form-group">
                        <label for="teleph">Telephone</label>
                        <input type="text" name="telephone" class="form-control" id="teleph" placeholder="Votre numero de telephone">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>