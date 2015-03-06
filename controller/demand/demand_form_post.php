<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( isset($_GET['project_id']) ){
    
    if( !empty($_GET['project_id']) ){
        
        if(
            isset($_POST['title']) &&
            isset($_POST['content']) &&
            isset($_POST['date_wished'])
        ){
            if(
                !empty($_POST['title']) &&
                !empty($_POST['content']) &&
                !empty($_POST['date_wished'])
            ){
                
                $project_id = (int) $_GET['project_id'];
                
                $demand = new Demand([
                    'demand_title' => $_POST['title'],
                    'demand_content' => $_POST['content'],
                    'demand_date_creation' => date("Y-m-d"),
                    'demand_date_wished' => $_POST['date_wished'],
                    'user_id' => $_controller->getUser()->getId(),
                    'project_id' => $project_id
                ]);
                
                $_controller->getDemandManager()->add($demand);
                header('Location: ../../?page=project_view&project_id='.$_GET['project_id']);
                
            }else{
                header('Location: ../../?page=demand_form_post&error=missing&project_id='.$_GET['project_id']);
            }
        }else{
            header('Location: ../../?page=demand_form_post&error=unknown&project_id='.$_GET['project_id']);
        }
    }else{
        header('Location: ../../?error=invalid_id');
    }
}else{
    header('Location: ../../?error=unknown');
}