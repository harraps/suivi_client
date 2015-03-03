<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="page-header">
            <h1>Connection</h1>
        </div>
    </div>
</div>

<form action="controller/user/connection_post.php" class="row">
    <div class="col-sm-6 col-sm-offset-3 well">
        <div class="form-horizontal">

            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">mot de passe</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-default">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>