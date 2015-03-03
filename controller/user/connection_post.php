<?php

include_once('../common/dbConnection.php');
require_once('../../model/user/User.php');
require_once('../../model/user/UserManager.php');

$manager = new UserManager($database);

if( isset($_GET['email']) && isset($_GET['password']) ){
    
    $user = $manager->getByEmail( $_GET['email'] );
    if( $user->checkPassword( $_GET['password'] ) ){
        session_start();
        $_SESSION['id'] = $user->getID();
        $_SESSION['firstname'] = $user->getFirstName();
        $_SESSION['lastname'] = $user->getLastName();
        $_SESSION['password'] = $user->getPassword();
    }
    
}
header('Location: ../../');