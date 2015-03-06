<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( isset($_GET['demand_id']) ){

    if( !empty($_GET['demand_id']) ){

        if( isset($_POST['content']) ){
            if( !empty($_POST['content']) ){
                
                $demand_id = (int) $_GET['demand_id'];
                
                $comment = new Comment([
                    'user_id' => $_controller->getUser()->getId(),
                    'demand_id' => $demand_id,
                    'comment_content' => $_POST['content'],
                    'comment_date' => date("Y-m-d")
                ]);
                
                $_controller->getCommentManager()->add($comment);
                header('Location: ../../?page=demand_view&demand_id='.$_GET['demand_id']);

            }else{
                header('Location: ../../?page=comment_form&error=missing&demand_id='.$_GET['demand_id']);
            }
        }else{
            header('Location: ../../?page=comment_form&error=unknown&demand_id='.$_GET['demand_id']);
        }
    }else{
        header('Location: ../../?error=invalid_id');
    }
}else{
    header('Location: ../../?error=unknown');
}