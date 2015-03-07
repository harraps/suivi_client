<?php

$RootDir = "../";
require_once($RootDir.'model/user/User.php');
require_once($RootDir.'model/project/Project.php');
require_once($RootDir.'model/demand/Demand.php');
require_once($RootDir.'model/comment/Comment.php');

/*

phpunit --bootstrap Test.php model/UserTest.php
phpunit --bootstrap Test.php model/ProjectTest.php
phpunit --bootstrap Test.php model/DemandTest.php
phpunit --bootstrap Test.php model/CommentTest.php

*/