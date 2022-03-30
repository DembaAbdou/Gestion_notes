<?php

    include('./config/authorisation.php');
    $req = $pdo->prepare("SELECT * FROM formations");
    $req->execute();

?>
<div class="row">
    <div class="container mt-5 w-100">
        <button class="border-0 h4 float-right" data-toggle="modal" data-target="#exampleModal">
            <i class="fa-solid fa-plus"></i> Nouveau
        </button>
    </div>
    <div class="mt-3 w-100">
        <div class="card">
            <div class="card-header text-center">
                <h2>List des Formations</h2>
            </div>
            <div class="card-body">
                
                <table class="table table-striped">
                    <thead class="text-white" style="background: rgb(89, 138, 89) !important;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">LIBELLE</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($form = $req->fetch()){ ?>
                            <tr>
                                <td><?php echo($form['id']) ?></td>
                                <td><?php echo($form['libelle']) ?></td>
                                <td>
                                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer');" href="./pages/formation/deleteFormation.php?id=<?php echo($form['id']) ?>" class="text-danger mr-2"><i class="fa fa-trash"></i></a>
                                    <a href="./pages/formation/editFormation.php?id=<?php echo($form['id']) ?>" class="mr-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Saisie Formation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./pages/formation/ajoutFormation.php">
                    <div class="form-group">
                        <label for="formation">Libelle formation</label>
                        <input type="text" name="libelle" class="form-control" id="formation" placeholder="Saisir libelle formation" required> 
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>