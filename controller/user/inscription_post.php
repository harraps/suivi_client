<?php

    include_once('../common/dbConnection.php');
    require_once('../../model/user/User.php');
    require_once('../../model/user/UserManager.php');

    //TODO cyphering password !

    if( $_POST['password1'] == $_POST['password2'] ){
        
        $manager = new UserManager($database);
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
        
        $manager->add($user);
    }
        
    header('Location: ../../');