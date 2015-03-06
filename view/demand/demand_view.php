<?php
// TODO check that the user have the right to see this page

$project;
if( isset($_GET['demand_id']) ){
    $demand = $_controller->getDemandManager()->get($_GET['demand_id']);
}else{
    // if the project id is not set we return to the main page
    header('Location: '.$RootURL);
}
$comments = $_controller->getCommentManager()->getByDemandId($demand->getId());
?>
<div class="row well">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="page-header">
            <h1><?php echo $demand->getTitle(); ?></h1>
        </div>
    </div>
</div>

<div class="row well">
    <div class="col-lg-12">
        <a href="<?php echo $RootURL."?page=comment_form&demand_id=".$demand->getId(); ?>" class="btn btn-success">
            <span class="visible-xs">+</span>
            <span class="hidden-xs">Ajouter commentaire</span>
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
        echo '</div><div class="row"';
    }
}
    ?>
</div>