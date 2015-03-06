<?php
    // only admins can create and modify projects
    if( !$_controller->getIsAdmin() ){
        // if we are not an admin we are sent back to the main page
        header('Location: '.$RootURL);
    }
    $project;
    $isModif = FALSE;
    if( isset($_GET['project_id']) ){
        if( !empty($_GET['project_id']) ){
            if( $_controller->getProjectManager()->exists($_GET['project_id']) ){
                $project = $_controller->getProjectManager()->get($_GET['project_id']);
                $isModif = TRUE;
            }
        }
    }
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="page-header">
            <h1>Projet</h1>
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

<form action="controller/project/project_form_post.php<?php if($isModif) echo '?project_id='.$project->getId(); ?>" method="post" class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="form-horizontal">
            
            <div class="form-group well">
                <label for="inputTitle" class="col-sm-2 control-label">Nom du projet</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="<?php if($isModif) echo $project->getName() ?>" >
                </div>
            </div>
            
            <h2><br/></h2>
            
            <span class="help-block">Ajoutez les utilisateurs qui travailleront sur le projet.</span>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Entreprise</th>
                        <th>+</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $users = $_controller->getUserManager()->getList();
                        $nb = 1;
                        foreach( $users as &$user ){
                            // if the user is himself, we don't display him in the list
                            if( $user->getId() != $_SESSION['id'] ){
                                
                                $checked = '';
                                if( $isModif ){
                                    if( $_controller->getProjectManager()->getLink( $user->getId(), $project->getId() ) ){
                                        $checked = 'checked';
                                    }
                                }
                    ?>
                    <tr>
                        <td><?php echo $nb; ++$nb; ?></td>
                        <td><?php echo $user->getFirstName(); ?></td>
                        <td><?php echo $user->getLastName(); ?></td>
                        <td><?php echo $user->getEntity(); ?></td>
                        <td><input type="checkbox" name="users_id[]" value="<?php echo $user->getId(); ?>"  <?php echo $checked; ?> /></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            
            <h2><br/></h2>
            
            <div class="form-group well">
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