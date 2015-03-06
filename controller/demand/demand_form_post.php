<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( isset($_GET['project_id']) || isset($_GET['demand_id']) ){
    
    if( !empty($_GET['project_id']) || !empty($_GET['demand_id']) ){
        
        if(
            isset($_POST['title']) &&
            isset($_POST['content']) &&
            isset($_POST['date_wished'])
        ){
            if(
                !empty($_POST['title']) &&
                !empty($_POST['date_wished'])
            ){
                
                if( !empty($_GET['project_id']) ){
                    
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
                    
                    $demand = $_controller->getDemandManager()->get($_GET['demand_id']);
                    $upDemand = new Demand([
                        'demand_id' => $demand->getId(),
                        'demand_title' => $_POST['title'],
                        'demand_content' => $_POST['content'],
                        'user_id' => $demand->getUser(),
                        'project_id' => $demand->getProject(),
                        'demand_date_creation' => $demand->getDateCreation(),
                        'demand_date_wished' => $_POST['date_wished'],
                        'demand_date_test' => $_POST['date_test'],
                        'demand_date_test_validation' => $demand->getDateTestValidation(),
                        'demand_date_production' => $_POST['date_production'],
                        'demand_date_production_validation' => $demand->getDateProductionValidation()
                    ]);
                    $_controller->getDemandManager()->update($upDemand);
                    header('Location: ../../?page=demand_view&demand_id='.$_GET['demand_id']);
                }
                
            }else{
                header('Location: ../../?page=demand_form&error=missing&project_id='.$_GET['project_id']);
            }
        }else{
            header('Location: ../../?page=demand_form&error=unknown&project_id='.$_GET['project_id']);
        }
    }else{
        header('Location: ../../?error=invalid_id');
    }
}else{
    header('Location: ../../?error=unknown');
}