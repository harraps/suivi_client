<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( isset($_GET['user_id']) ){
    
    if( !empty($_GET['user_id']) ){
        
        $user_id = (int) $_GET['user_id'];
        
        if( $_controller->getIsAdmin() ){
            $_controller->getUserManager()->delete($user_id);
        }
        header('Location: ../../?page=user_list');

    }else{
        header('Location: ../../?error=invalid_id');
    }
}else{
    header('Location: ../../?error=unknown');
}