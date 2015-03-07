<?php if( isset($_GET['error']) ){ ?>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Attention !</h4>
            <p>
                <?php 
                    if( $_GET['error'] == "missing" ){
                        echo "Vous avez oublié de remplir les champs.";
                    }elseif( $_GET['error'] == "invalid_id" ){
                        echo "L'id est invalide.";
                    }else{
                        echo "Une erreur inconnue est survenue.";
                    }
                ?>
            </p>
        </div>
    </div>
</div>
<?php } ?>

<div class="center-block">
    <div class="jumbotron">
        <?php if( !$_controller->getIsConnected() ){ ?>
        <h1>Bienvenue</h1>
        <p>Pour utiliser notre service de suivi de projet, veuillez vous connecter.</p>
        <div>
            <a href="<?php echo $RootURL; ?>?page=inscription" class="btn btn-default">Inscription</a>
            <a href="<?php echo $RootURL; ?>?page=connection" class="btn btn-primary">Connection</a>
        </div>
        <?php }else{ ?>
        <h1>Bienvenue <?php echo $_controller->getUser()->getFirstName()." ".$_controller->getUser()->getLastName(); ?>,</h1>
        <p>Nous vous invitons à voir vos projets.</p>
        <div>
            <a href="<?php echo $RootURL; ?>?page=project_list" class="btn btn-primary">Mes projets</a>
        </div>
        <?php } ?>
    </div>
</div>