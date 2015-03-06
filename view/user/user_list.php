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

<div class="row">
    <div class="col-md-12">
        <div class="form-horizontal">

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
                            <div class="pull-right">
                                <?php if( $user->getIsAdmin() ){ ?>
                                    <a href="<?php echo $RootURL."controller/user/user_remove_admin.php?user_id=".$user->getId(); ?>" class="btn btn-xs btn-warning">
                                        <span class="visible-xs">-</span>
                                        <span class="hidden-xs">Retirer Droits</span>
                                    </a>
                                <?php }else{ ?>
                                    <a href="<?php echo $RootURL."controller/user/user_add_admin.php?user_id=".$user->getId(); ?>" class="btn btn-xs btn-success">
                                        <span class="visible-xs">+</span>
                                        <span class="hidden-xs">Ajouter Droits</span>
                                    </a>
                                <?php } ?>
                                <a href="<?php echo $RootURL."controller/user/user_delete.php?user_id=".$user->getId(); ?>" class="btn btn-xs btn-danger">
                                    <span class="visible-xs">x</span>
                                    <span class="hidden-xs">Supprimer</span>
                                </a>
                            </div>
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