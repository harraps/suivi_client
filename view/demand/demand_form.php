
<?php
    
    if( !isset($_GET['project_id']) && !isset($_GET['demand_id']) ){
        // if the project id is not set we return to the main page
        header('Location: '.$RootURL.'?error=invalid_id');
    }
    $isModif = FALSE;
    $demand;
    $project;
    if( isset($_GET['demand_id']) ){
        if( !empty($_GET['demand_id']) ){
            if( 
                $_controller->getIsAdmin() ||
                $_controller->getDemandManager()->getLink( $_controller->getUser()->getId(), $_GET['demand_id'] )
            ){
                $isModif = TRUE;
                $demand = $_controller->getDemandManager()->get($_GET['demand_id']);
            }else{
                header('Location: '.$RootURL.'?error=invalid_id');
            }
        }
    }elseif( isset($_GET['project_id']) ){
        if( !empty($_GET['project_id']) ){
            if(
                $_controller->getIsAdmin() ||
                $_controller->getProjectManager()->getLink( $_controller->getUser()->getId(), $_GET['project_id'] )
            ){
                $project = $_controller->getProjectManager()->get($_GET['project_id']);
            }else{
                header('Location: '.$RootURL.'?error=invalid_id');
            }
        }else{
            header('Location: '.$RootURL.'?error=invalid_id');
        }
    }
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="page-header">
            <h1>Demande</h1>
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
<?php
    }

    $action;
    $return;
    if($isModif){
        $action = 'demand_id='.$demand->getId();
        $return = $RootURL.'?page=demand_view&demand_id='.$demand->getId();
    }else{
        $action = 'project_id='.$project->getId();
        $return = $RootURL.'?page=project_view&project_id='.$project->getId();
    }
?>
<form action="controller/demand/demand_form_post.php?<?php echo $action; ?>" method="post" class="row">
    <div class="col-sm-8 col-sm-offset-2 well">
        <div class="form-horizontal">
            
            <div class="form-group">
                <label for="inputTitle" class="col-sm-3 control-label">Titre</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title" value="<?php if($isModif) echo $demand->getTitle(); ?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="textArea" class="col-sm-3 control-label">Contenu</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="textArea" name="content" style="resize:vertical;"><?php if($isModif) echo $demand->getContent(); ?></textarea>
                    <span class="help-block">Ajoutez votre demande sur le projet que vous avez sélectionné (500 caractères maximum).</span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputDate" class="col-sm-3 control-label">Date de livraison souhaité</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputDate" name="date_wished" placeholder="yyyy-mm-dd" min="<?php echo(date("Y-m-d")); ?>" value="<?php if($isModif) echo $demand->getDateWished(); ?>" >
                </div>
            </div>
            
            <?php if( $_controller->getIsAdmin() ){ ?>
            <div class="form-group">
                <label for="inputDate" class="col-sm-3 control-label">Date de tests</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputDate" name="date_test" placeholder="yyyy-mm-dd" min="<?php echo(date("Y-m-d")); ?>" value="<?php if($isModif) echo $demand->getDateTest(); ?>" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputDate" class="col-sm-3 control-label">Date de mise en production</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputDate" name="date_production" placeholder="yyyy-mm-dd" min="<?php echo(date("Y-m-d")); ?>" value="<?php if($isModif) echo $demand->getDateProduction(); ?>" >
                </div>
            </div>
            <?php } ?>
            
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <a href="<?php echo $return; ?>" class="btn btn-default">Annuler</a>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>