<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="page-header">
            <h1>Commentaire</h1>
        </div>
    </div>
</div>

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

<form  action="controller/comment/comment_form_post.php?demand_id=<?php echo $_GET['demand_id']; ?>" method="post" class="row">
    <div class="col-sm-8 col-sm-offset-2 well">

            <div class="form-group">
                <label for="textArea" class="col-sm-3 control-label">Votre commentaire</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" name="content" style="resize:vertical;"></textarea>
                    <span class="help-block">Ajoutez votre commentaire sur la demande que vous avez sélectionné (500 caractères maximum).</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <a href="<?php echo $RootURL.'?page=demand_view&demand_id='.$_GET['demand_id']; ?>" class="btn btn-default">Annuler</a>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>

    </div>
</form>