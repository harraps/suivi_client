<?php
    if( !$_controller->getIsConnected() ){
        header('Location: '.$RootURL);
    }
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="page-header">
            <?php if( $_controller->getIsAdmin() ){ ?>
            <a href="<?php echo $RootURL; ?>?page=project_form" class="btn btn-success pull-right" > + Nouveau projet</a>
            <?php } ?>
            <h1>Projets</h1>
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

<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="form-horizontal">

            <span class="help-block">Liste des projets sur lesquels vous travaillez.</span>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th class="text-right">
                            <span class="visible-xs">U</span>
                            <span class="hidden-xs">Utilisateurs</span>
                        </th>
                        <th class="text-right">
                            <span class="visible-xs">D</span>
                            <span class="hidden-xs">Demandes</span>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        
                        $nb = 1;

                        $projects;
                        if( $_controller->getIsAdmin() ){
                            // if we are admin, we want to see all of the projects
                            $projects = $_controller->getProjectManager()->getList();
                        }else{
                            // if we are a regular user, we only want to see our project
                            $projects = $_controller->getProjectManager()->getByUserId($_controller->getUser()->getId());
                        }

                        foreach( $projects as &$project ){
                            $demands = $_controller->getDemandManager()->getByProjectId($project->getId());
                    ?>
                        <tr>
                            <td><?php echo $nb; ++$nb; ?></td>
                            <td><?php echo $project->getName(); ?></td>
                            <td class="text-right"><?php echo count( $project->getUsers() ); ?></td>
                            <td class="text-right"><?php echo count( $demands ); ?></td>
                            <td>
                                <a href="<?php echo $RootURL."?page=project_view&project_id=".$project->getId(); ?>" class="btn btn-sm btn-info pull-right">
                                    Voir
                                </a>
                            </td>
                        </tr>
                    <?php 
                        } 
                    ?>
                    
                </tbody>
            </table>

        </div>
    </div>
</div>