<?php

// We use this class as a namespace to contains all of the functions necessary for the whole website

session_start();
require_once($RootDir.'model/user/User.php');
require_once($RootDir.'model/user/UserManager.php');
require_once($RootDir.'model/project/Project.php');
require_once($RootDir.'model/project/ProjectManager.php');
require_once($RootDir.'model/demand/Demand.php');
require_once($RootDir.'model/demand/DemandManager.php');
require_once($RootDir.'model/comment/Comment.php');
require_once($RootDir.'model/comment/CommentManager.php');
require_once($RootDir.'controller/Controller.php');

$_database = new PDO('mysql:host=localhost; dbname=Suivi_client; charset=utf8', 'root', '');
$_controller = new Controller($_database);