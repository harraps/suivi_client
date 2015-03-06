<?php

$project;
if( isset($_GET['demand_id']) ){
    $demand = $_controller->getDemandManager()->get($_GET['demand_id']);
}else{
    // if the project id is not set we return to the main page
    header('Location: '.$RootURL);
}
$comments = $_controller->getCommentManager()->getByDemandId($demand->getId());
?>

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
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h1><?php echo $demand->getTitle(); ?></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3 well">
        <p><?php echo $demand->getContent(); ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover ">
            <tbody>
                <tr>
                    <td>Date de création</td>
                    <td><?php echo $demand->getDateCreation(); ?></td>
                    <td></td>
                </tr>
                <?php
                    $dateWished = new DateTime($demand->getDateWished());
                    $style = "";
                    if( $dateWished->format("Ymd") <= date("Ymd") ){
                        $style = 'danger text-danger';
                    }
                ?>
                <tr class="<?php echo $style; ?>">
                    <td>Date de livraison désirée</td>
                    <td><?php echo $demand->getDateWished(); ?></td>
                    <td></td>
                </tr>
                <?php
                    if( !empty($demand->getDateTest()) ){
                ?>
                <tr>
                    <td>Date de tests</td>
                    <td><?php echo $demand->getDateTest(); ?></td>
                    <td>
                        <?php
                            if( empty($demand->getDateTestValidation()) ){
                        ?>
                        <a href="controller/demand/date_validation.php?validation=test&demand_id=<?php echo $demand->getId()?>" class="btn btn-sm btn-success">
                            Valider
                        </a>
                        <?php
                            }
                        ?>
                    </td>
                </tr>
                <?php
                    }
                    if( !empty($demand->getDateTestValidation()) ){
                ?>
                <tr>
                    <td>Date de validation des tests</td>
                    <td><?php echo $demand->getDateTestValidation(); ?></td>
                    <td></td>
                </tr>
                <?php
                    }
                    if( !empty($demand->getDateProduction()) ){
                ?>
                <tr>
                    <td>Date de mise en production</td>
                    <td><?php echo $demand->getDateProduction(); ?></td>
                    <td>
                        <?php
                        if( empty($demand->getDateProductionValidation()) ){
                        ?>
                        <a href="controller/demand/date_validation.php?validation=production&demand_id=<?php echo $demand->getId()?>" class="btn btn-sm btn-success">
                            Valider
                        </a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
                    }
                    if( !empty($demand->getDateProductionValidation()) ){
                ?>
                <tr>
                    <td>Date de validation de la mise en production</td>
                    <td><?php echo $demand->getDateProductionValidation(); ?></td>
                    <td></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table> 
    </div>
</div>

<div class="row well">
    <div class="col-lg-12">
        <a href="<?php echo $RootURL."?page=comment_form&demand_id=".$demand->getId(); ?>" class="btn btn-success">
            +<span class="hidden-xs"> Ajouter commentaire</span>
        </a>
        <div class="btn-group pull-right">
            <a href="<?php echo $RootURL."?page=demand_form&demand_id=".$demand->getId(); ?>" class="btn btn-warning">
                <span class="visible-xs">*</span>
                <span class="hidden-xs">Modifier</span>
            </a>
            <a href="<?php echo $RootURL."controller/demand/demand_delete.php?project_id=".$demand->getProject()."&demand_id=".$demand->getId(); ?>" class="btn btn-danger">
                <span class="visible-xs">x</span>
                <span class="hidden-xs">Supprimer</span>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <?php
        $tier_count = 0;
        foreach( $comments as &$comment ){
            $user = $_controller->getUserManager()->get($comment->getUser());
    ?>
    <div class="col-sm-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo $user->getFirstName().' '.$user->getLastName(); ?>
                <span class="pull-right">
                    <?php echo $comment->getDate(); ?>
                </span>
            </div>
            <div class="panel-body">
                <?php echo $comment->getContent(); ?>
            </div>
        </div>
    </div>
    <?php
    ++$tier_count;
    $tier_count %= 3;
    if( $tier_count == 0 ){
        echo '</div><div class="row">';
    }
}
    ?>
</div>