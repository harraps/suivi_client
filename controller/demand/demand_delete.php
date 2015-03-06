<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( 
    isset($_GET['demand_id']) &&
    isset($_GET['project_id'])
){
    if(
        !empty($_GET['demand_id']) &&
        !empty($_GET['project_id'])
    ){
        
        $demand_id = (int) $_GET['demand_id'];
        $project_id = (int) $_GET['project_id'];
        
        $_controller->getDemandManager()->delete($demand_id);
        header('Location: ../../?page=project_view&project_id='.$project_id);
            
    }else{
        header('Location: ../../?page=project_list&error=invalid_id');
    }
}else{
    header('Location: ../../?page=project_list&error=invalid_id');
}