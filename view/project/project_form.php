<?php
    if( isset($_GET['project_id']) ){
        if( !empty($_GET['project_id']) ){
            $project_id = (int) $_GET['project_id'];
            
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

<form action="controller/project/project_form_post.php" method="post" class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="form-horizontal">
            
            <div class="form-group well">
                <label for="inputTitle" class="col-sm-2 control-label">Nom du projet</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
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
                        $users = $_userManager->getList();
                        $nb = 1;
                        foreach( $users as &$user ){
                            // if the user is himself, we don't display him in the list
                            if( $user->getId() != $_SESSION['id'] ){
                    ?>
                    <tr>
                        <td><?php echo $nb; ++$nb; ?></td>
                        <td><?php echo $user->getFirstName(); ?></td>
                        <td><?php echo $user->getLastName(); ?></td>
                        <td><?php echo $user->getEntity(); ?></td>
                        <td><input type="checkbox" name="users_id[]" value="<?php echo $user->getId(); ?>" /></td>
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