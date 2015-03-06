<?php

    $project;
    if( isset($_GET['project_id']) ){
        $project = $_controller->getProjectManager()->get($_GET['project_id']);
    }else{
        // if the project id is not set we return to the main page
        header('Location: '.$RootURL);
    }
    $demands = $_controller->getDemandManager()->getByProjectId($project->getId());
?>
<div class="row well">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="page-header">
            <h1><?php echo $project->getName(); ?></h1>
        </div>
    </div>
</div>

<div class="row well">
    <div class="col-lg-12">
        <a href="<?php echo $RootURL."?page=demand_form&project_id=".$project->getId(); ?>" class="btn btn-success">
            <span class="visible-xs">+</span>
            <span class="hidden-xs">Ajouter une demande</span>
        </a>
        <div class="btn-group pull-right">
            <a href="<?php echo $RootURL."?page=project_form&project_id=".$project->getId(); ?>" class="btn btn-warning">
                <span class="visible-xs">*</span>
                <span class="hidden-xs">Modifier</span>
            </a>
            <a href="<?php echo $RootURL."controller/project/project_delete.php?project_id=".$project->getId(); ?>" class="btn btn-danger">
                <span class="visible-xs">x</span>
                <span class="hidden-xs">Supprimer</span>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <?php
        $tier_count = 0;
        foreach( $demands as &$demand ){
    ?>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo $demand->getTitle(); ?>
                <span class="pull-right">
                    <?php echo $demand->getDateCreation(); ?>
                </span>
            </div>
            <div class="panel-body">
                <?php echo $demand->getContent(); ?>
                <br/><br/>
                <table class="table table-striped table-hover ">
                    <tbody>
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
                        </tr>
                        <?php
                            if( !empty($demand->getDateTest()) ){
                        ?>
                        <tr>
                            <td>Date de tests</td>
                            <td><?php echo $demand->getDateTest(); ?></td>
                        </tr>
                        <?php
                            }
                            if( !empty($demand->getDateTestValidation()) ){
                        ?>
                        <tr>
                            <td>Date de validation des tests</td>
                            <td><?php echo $demand->getDateTestValidation(); ?></td>
                        </tr>
                        <?php
                            }
                            if( !empty($demand->getDateProduction()) ){
                        ?>
                        <tr>
                            <td>Date de mise en production</td>
                            <td><?php echo $demand->getDateProduction(); ?></td>
                        </tr>
                        <?php
                            }
                            if( !empty($demand->getDateProductionValidation()) ){
                        ?>
                        <tr>
                            <td>Date de validation de la mise en production</td>
                            <td><?php echo $demand->getDateProductionValidation(); ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <a href="<?php echo $RootURL."?page=demand_view&demand_id=".$demand->getId(); ?>" class="btn btn-sm btn-info">
                    Voir
                </a>
            </div>
        </div>
    </div>
    <?php
            ++$tier_count;
            $tier_count %= 3;
            if( $tier_count == 0 ){
                echo '</div><div class="row"';
            }
        }
    ?>
</div>