
<?php
    // TODO check that the user have the right to see this page
    
    if( !isset($_GET['project_id']) ){
        // if the project id is not set we return to the main page
        header('Location: '.$RootURL.'?error=invalid_id');
    }
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="page-header">
            <h1>Demande</h1>
        </div>
    </div>
</div>

<form action="controller/demand/demand_form_post.php?project_id=<?php echo $_GET['project_id']; ?>" method="post" class="row">
    <div class="col-sm-8 col-sm-offset-2 well">
        <div class="form-horizontal">
            
            <div class="form-group">
                <label for="inputTitle" class="col-sm-3 control-label">Titre</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title">
                </div>
            </div>
            
            <div class="form-group">
                <label for="textArea" class="col-sm-3 control-label">Contenu</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="textArea" name="content" style="resize:vertical;"></textarea>
                    <span class="help-block">Ajoutez votre demande sur le projet que vous avez sélectionné (500 caractères maximum).</span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputDate" class="col-sm-3 control-label">Date de livraison souhaité</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputDate" name="date_wished" placeholder="yyyy-mm-dd" min="<?php echo(date("Y-m-d")); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-default">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>