<?php
    require_once('./config/authorisation.php');
?>
<div class="row">
    <div class="container mt-5 w-100">
        <button type="button" class="btn btn-secondary float-right font-weight-bold" data-toggle="modal" data-target="#exampleModal">
            Nouveau Note
        </button>
    </div>
    <div class="mt-3 w-100">
        <div class="card">
            <div class="card-header text-center">
                <h2>List des Notes</h2>
            </div>
            <div class="card-body">
                
                <table class="table table-striped">
                    <thead class="text-white" style="background: rgb(89, 138, 89) !important;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">VALEUR</th>
                            <th scope="col">TYPE DE NOTE</th>
                            <th scope="col">ETUDIANT</th>
                            <th scope="col">MATIERE</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Ajout Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./pages/etudiant/ajoutEtudiant.php">
                    <div class="form-group">
                        <label for="valeur">Valeur</label>
                        <input type="text" name="valeur" class="form-control" id="valeur" placeholder="Valeur de la note" required> 
                    </div>
                    <div class="form-group">
                        <label>Type de note</label>
                        <select class="form-control" name="type_note">
                            <option selected disabled>Selectionner le type de note</option>
                            <option value="devoir">Devoir</option>
                            <option value="tp">TP</option>
                            <option value="td">TD</option>
                            <option value="plus">+</option>
                            <option value="moins">-</option>
                            <option value="finale">Finale</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Etudiant</label>
                        <select class="form-control" name="etudiant">
                            <option selected disabled>Selectionner un etudiant</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Matiere</label>
                        <select class="form-control" name="matiere">
                            <option selected disabled>Selectionner une matiere</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>