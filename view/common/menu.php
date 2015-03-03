<div class="row">
    <div class="col-lg-12">
        <div class="navbar navbar-default">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/suivi_client">
                    <?php
                        if( $_isConnected && isset($_SESSION['lastname']) ){
                            echo $_SESSION['lastname'];
                        }else{
                            echo 'Suivi Client';
                        }
                    ?>
                </a>
            </div>
            
            <div class="navbar-collapse collapse navbar-responsive-collapse" aria-expanded="true">
                
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Projets <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/suivi_client/?page=project_list">Voir les projets</a></li>
                            <li><a href="/suivi_client/?page=project_form">Créer un projets</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Demandes <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/suivi_client/?page=demand_list">Voir les demandes</a></li>
                            <li><a href="/suivi_client/?page=demand_form">Créer une demande</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Commentaires <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/suivi_client/?page=comment_list">Voir les commentaires</a></li>
                            <li><a href="/suivi_client/?page=comment_form">Créer un commentaire</a></li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if( $_isConnected ){ ?>
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
                                <li><a href="/suivi_client/?page=inscription">s'inscrire</a></li>
                                <li><a href="/suivi_client/?page=connection">se connecter</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
                
            </div>
            
        </div>
    </div>
</div>
