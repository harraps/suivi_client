<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="page-header">
            <h1>Demande</h1>
        </div>
    </div>
</div>

<form class="row">
    <div class="col-sm-8 col-sm-offset-2 well">
        <div class="form-horizontal">
            
            <div class="form-group">
                <label for="inputTitle" class="col-sm-3 control-label">Titre</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" placeholder="Title">
                </div>
            </div>
            
            <div class="form-group">
                <label for="textArea" class="col-sm-3 control-label">Contenu</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="textArea" style="resize:vertical;"></textarea>
                    <span class="help-block">Ajoutez votre demande sur le projet que vous avez sélectionné (500 caractères maximum).</span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputDate" class="col-sm-3 control-label">Date de livraison souhaité</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputDate" placeholder="yyy-mm-dd" min="<?php echo(date("Y-m-d")); ?>">
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