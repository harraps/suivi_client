<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Suivi Client</title>
        <meta name="author" content="Olivier Schyns" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="view/common/css/bootstrap.min.css" rel="stylesheet" />
        <script src="view/common/js/jquery.min.js"></script>
        <script src="view/common/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <div class="container">
            <?php
                // we store the root of the project in a global variable
                $RootDir = __DIR__;
                include_once('controller/common/dbConnection.php');
                include_once('controller/common/controller.php');

                // we add the main menu to the page
                include_once('view/common/menu.php');
                
                // we set the page based on a URL parameter
                $page = 'accueil';
                
                if( isset($_GET['page']) ){
                    $page = $_GET['page'];
                }
                
                switch ($page){
                    case 'accueil' :
                        include ('view/accueil/accueil.php');
                        break;
                    case 'connection' :
                        include ('view/user/connection.php');
                        break;
                    case 'inscription' :
                        include ('view/user/inscription.php');
                        break;
                    case 'comment_form' :
                        include ('view/comment/comment_form.php');
                        break;
                    case 'comment_list' :
                        include ('view/comment/comment_list.php');
                        break;
                    case 'demand_form' :
                        include ('view/demand/demand_form.php');
                        break;
                    case 'demand_list' :
                        include ('view/demand/demand_list.php');
                        break;
                    case 'project_form' :
                        include ('view/project/project_form.php');
                        break;
                    case 'project_list' :
                        include ('view/project/project_list.php');
                        break;
                    default :
                        include ('view/accueil/accueil.php');
                        break;
                }
            ?>
        </div>
        
    </body>
</html>