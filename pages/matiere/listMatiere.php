<?php
    require_once('./config/authorisation.php');
    $req = $pdo->prepare("SELECT * FROM formations");
    $req->execute();
?>
<div class="row">
    <div class="container mt-5 w-100">
        <button type="button" class="btn btn-secondary float-right font-weight-bold" data-toggle="modal" data-target="#exampleModal">
            Nouveau Matiere
        </button>
    </div>
    <div class="mt-3 w-100">
        <div class="card">
            <div class="card-header text-center">
                <h2>List des Matieres</h2>
            </div>
            <div class="card-body">
                
                <table class="table table-striped">
                    <thead class="text-white" style="background: rgb(89, 138, 89) !important;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CODE</th>
                            <th scope="col">LIBELLE</th>
                            <th scope="col">FORMATION</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>

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
                <h5 class="modal-title" id="exampleModalLabel">Saisie Matiere</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./pages/etudiant/ajoutEtudiant.php">
                    <div class="form-group">
                        <label for="code">Code matiere</label>
                        <input type="text" name="code" class="form-control" id="code" placeholder="Saisir code matiere" required> 
                    </div>
                    <div class="form-group">
                        <label for="libelle">Libelle matiere</label>
                        <input type="text" name="libelle" class="form-control" id="libelle" placeholder="Saisir code matiere" required>
                    </div>
                    <div class="form-group">
                        <label>Formation</label>
                        <select class="form-control" name="formation">
                            <option selected disabled>Selectionner une formation</option>
                            <?php while($form = $req->fetch()){ ?>
                                <option value="<?php echo($form['id']) ?>"><?php echo($form['libelle']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>