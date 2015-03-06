<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( 
    isset($_POST['entity']) &&
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['email']) &&
    isset($_POST['password1']) &&
    isset($_POST['password2'])
){
    if( 
        !empty($_POST['entity']) &&
        !empty($_POST['firstname']) &&
        !empty($_POST['lastname']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password1']) &&
        !empty($_POST['password2'])
    ){     
        // we check that the passwords match
        if( $_POST['password1'] == $_POST['password2'] ){
            $user = new User([
                'user_entity' => $_POST['entity'],
                'user_first_name' => $_POST['firstname'],
                'user_last_name' => $_POST['lastname'],
                'user_email' => $_POST['email'],
                'user_address' => $_POST['address'],
                'user_phone' => $_POST['phone'],
                'user_password' => $_POST['password1']
            ]);

            // we cypher the password of the user before saving it into the database
            $user->setPassword( sha1( $user->getPassword() ) );
                
            // if we specified a user id then we want to edit a user
            if( isset($_GET['user_id']) ){
                if( !empty($_GET['user_id']) ){
                    $user_id = (int) $_GET['user_id'];
                    if( $_controller->getIsConnected() ){
                        if(
                            $_controller->getIsAdmin() ||
                            ($_controller->getUser()->getId() == $user_id)
                        ){
                            $user->setId($user_id);
                            $_controller->getUsermanager()->update($user);
                        }
                    }
                }
            }else{
                // we check that an other user doesn't have this email already
                if( !$_controller->checkEmail($_POST['email']) ){
                    
                    // if there is no user id then we want to create a new user
                    $_controller->getUserManager()->add($user);
                    
                }else{
                    header('Location: ../../?page=inscription&error=email');
                }
            }
                
            // everything worked fine we can return to the main page
            header('Location: ../../');
                
        }else{
            header('Location: ../../?page=inscription&error=password');
        }
    }else{
        header('Location: ../../?page=inscription&error=missing');
    }
}else{
    header('Location: ../../?page=inscription&error=unkown');
}