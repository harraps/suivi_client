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
                
                // we add the main menu to the page
                include ('view/common/menu.php');
                
                // we set the page based on a URL parameter
                $page = $_GET['page'];
                switch ($page){
                    case 'connection' :
                        include ('view/user/connection.php');
                        break;
                    case 'inscription' :
                        include ('view/user/inscription.php');
                        break;
                }
            ?>
        </div>

    </body>
</html>