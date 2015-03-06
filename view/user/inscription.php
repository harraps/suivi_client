<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Inscription</h1>
        </div>
    </div>
</div>

<?php if( isset($_GET['error']) ){ ?>
<div class="row">
    <div class="col-lg-6">
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Attention !</h4>
            <p>
            <?php 
                if( $_GET['error'] == "missing" ){
                    echo "Vous avez oublié de remplir les champs obligatoires.";
                }elseif( $_GET['error'] == "password" ){
                    echo "Les deux mots de passe ne sont pas identiques.";
                }elseif( $_GET['error'] == "email" ){
                    echo "L'email que vous avez spécifié est déjà prise.";
                }else{
                    echo "Une erreur inconnue est survenue.";
                }
            ?>
            </p>
        </div>
    </div>
</div>
<?php } ?>

<form action="controller/user/inscription_post.php" method="post" class="row well">
    <div class="col-sm-6">
        <div class="form-horizontal">

            <div class="form-group">
                <label for="inputFirstname" class="col-lg-2 control-label">Prénom</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputFirstname" name="firstname" placeholder="First name">
                </div>
            </div>

            <div class="form-group">
                <label for="inputLastname" class="col-lg-2 control-label">Nom</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="Last name">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 control-label">mot de passe</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword1" name="password1" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword2" class="col-lg-2 control-label">retapez votre mot de passe</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="Password">
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-horizontal">

            <div class="form-group">
                <label for="inputAddress" class="col-lg-2 control-label">Adresse*</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPhone" class="col-lg-2 control-label">Téléphone*</label>
                <div class="col-lg-10">
                    <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="Phone">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEntity" class="col-lg-2 control-label">Entreprise</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEntity" name="entity" placeholder="Entity">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <span class="help-block">* : Champs optionnels.</span>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <div class="pull-right">
                <button type="reset" class="btn btn-default">Annuler</button>
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
        </div>
    </div>

</form>