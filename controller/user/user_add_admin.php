<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( 
    isset($_GET['user_id'])
){
    if(
        !empty($_GET['user_id'])
    ){
        $user_id = (int) $_GET['user_id'];
        
        // if the user making the change is a valid admin
        if( $_controller->getIsAdmin() ){
            
            // we recover the user we want to update from the database
            $user = $_controller->getUserManager()->get($user_id);
            
            // we set the rights of the user to true
            $user->setIsAdmin(TRUE);
            
            // we update the user
            $_controller->getUserManager()->update($user);
        }
        header('Location: ../../?page=user_list');

    }else{
        header('Location: ../../?error=invalid_id');
    }
}else{
    header('Location: ../../?error=unknown');
}