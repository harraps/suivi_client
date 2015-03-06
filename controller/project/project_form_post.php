<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( isset($_POST['name']) ){
    
    if( !empty($_POST['name']) ){
        
        // we recover the ids from the form
        $users_id = [];
        if( isset($_POST['users_id']) ){
            $users_id = $_POST['users_id'];
        }
        
        $users_id[] = $_controller->getUser()->getId();
        
        $project = new Project([
            'project_name' => $_POST['name'],
            'users_id' => $users_id
        ]);
        
        if( isset($_GET['project_id']) ){
            if( !empty($_GET['project_id']) ){
                
                $project->setId($_GET['project_id']);
                $_controller->getProjectManager()->update($project);
            }
        }else{
            $_controller->getProjectManager()->add($project);
        }
        
        // everything worked fine we can return to the list of projects
        header('Location: ../../?page=project_list');
        
    }else{
        header('Location: ../../?page=project_form&error=missing');
    }
}else{
    header('Location: ../../?page=project_form&error=unkown');
}