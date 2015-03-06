<div class="row">
    <div class="col-lg-12">
        <div class="navbar navbar-default">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $RootURL; ?>">
                    <?php
                        if( $_controller->getIsConnected() ){
                            echo $_controller->getUser()->getLastName();
                        }else{
                            echo 'Suivi Client';
                        }
                    ?>
                </a>
            </div>
            
            <div class="navbar-collapse collapse navbar-responsive-collapse" aria-expanded="true">
                
                <ul class="nav navbar-nav">
                    <?php if( $_controller->getIsConnected() ){ ?>
                    <li><a href="<?php echo $RootURL; ?>?page=project_list">Projets</a></li>
                    <?php if( $_controller->getIsAdmin() ){ ?>
                    <li><a href="<?php echo $RootURL; ?>?page=user_list">Utilisateurs</a></li>
                    <?php 
                            }
                        }
                    ?>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if( $_controller->getIsConnected() ){ ?>
                        <li>
                            <form action="controller/common/deconnection.php" class="navbar-form">
                                <button class="btn btn-primary" type="submit">se déconnecter</button>
                            </form>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                s'authentifier <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $RootURL; ?>?page=inscription">s'inscrire</a></li>
                                <li><a href="<?php echo $RootURL; ?>?page=connection">se connecter</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
                
            </div>
            
        </div>
    </div>
</div>
