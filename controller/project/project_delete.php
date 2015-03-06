<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( isset($_GET['project_id']) ){
    if( !empty($_GET['project_id']) ){
        
        $project_id = (int) $_GET['project_id'];
        $_controller->getProjectManager()->delete($project_id);

        // everything worked fine we can return to the main page
        header('Location: ../../');
    }else{
        header('Location: ../../?page=project_list&error=missing');
    }
}else{
    header('Location: ../../?page=project_list&error=invalid_id');
}