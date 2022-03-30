<div class="container col-md-6 col-sm-8 col-xs-12 md-offset-3 sm-offset-2 mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Formulaire d'authentification</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="./pages/connexion/connexion.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input type="email" name="login" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>