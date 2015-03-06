<?php
if( !$_controller->getIsConnected() || !$_controller->getIsAdmin() ){
    header('Location: '.$RootURL);
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Utilisateurs</h1>
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
    <div class="col-md-12">
        <div class="form-horizontal">
            
            <a href="<?php echo $RootURL; ?>?page=inscription" class="btn btn-success pull-right">+ Ajouter</a>
            <span class="help-block">Liste des utilisateurs du site.</span>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Entreprise</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $nb = 1;
                        $users = $_controller->getUserManager()->getList();
                        foreach( $users as &$user ){
                            $style = '';
                            if( $user->getIsAdmin() ){
                                $style = 'class="success text-success"';
                            }
                    ?>
                    <tr <?php echo $style; ?> >
                        <td><?php echo $nb; ++$nb; ?></td>
                        <td><?php echo $user->getFirstName(); ?></td>
                        <td><?php echo $user->getLastName(); ?></td>
                        <td><?php echo $user->getEmail(); ?></td>
                        <td><?php echo $user->getEntity(); ?></td>
                        <td>                        
                            <a href="<?php echo $RootURL."?page=inscription&user_id=".$user->getId(); ?>" class="btn btn-xs btn-warning pull-right">
                                <span class="visible-xs">*</span>
                                <span class="hidden-xs">Modifier</span>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo $RootURL."controller/user/user_delete.php?user_id=".$user->getId(); ?>" class="btn btn-xs btn-danger pull-right">
                                <span class="visible-xs">x</span>
                                <span class="hidden-xs">Supprimer</span>
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