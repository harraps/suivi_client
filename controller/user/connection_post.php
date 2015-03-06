<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

if( 
    isset($_POST['email']) &&
    isset($_POST['password'])
){
    if(
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ){
        
        // we check that the email exists in the database
        if( $_controller->checkEmail($_POST['email']) ){
            $user = $_controller->getUserManager()->getByEmail( $_POST['email'] );
            
            // we check that the password match the cyphered one from the database
            if( $user->checkPassword( $_POST['password'] ) ){
                
                $_SESSION['id'] = $user->getId();
                $_SESSION['password'] = $user->getPassword();

                // everything worked fine we can return to the main page
                header('Location: ../../');
                
            }else{
                header('Location: ../../?page=connection&error=password');
            }
        }else{
            header('Location: ../../?page=connection&error=email');
        }
    }else{
        header('Location: ../../?page=connection&error=missing');
    }
}else{
    header('Location: ../../?page=connection&error=unknown');
}