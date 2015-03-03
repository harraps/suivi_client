<?php

    require_once('model/user/User.php');
    require_once('model/user/UserManager.php');
    require_once('model/project/Project.php');
    require_once('model/project/ProjectManager.php');
    require_once('model/demand/Demand.php');
    require_once('model/demand/DemandManager.php');
    require_once('model/comment/Comment.php');
    require_once('model/comment/CommentManager.php');

    $_isConnected = false;
    $_userManager = new UserManager($database);
    if(
        isset($_SESSION['id']) &&
        isset($_SESSION['firstname']) &&
        isset($_SESSION['lastname']) &&
        isset($_SESSION['password'])
    ){
        if( $_userManager->checkSession( $_SESSION['id'], $_SESSION['password'] ) ){
            $_isConnected = true;
        }else{
            header('Location: controller/common/deconnection.php');
        }
    }

