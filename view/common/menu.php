<div class="row">
    <div class="col-lg-12">
        <div class="navbar navbar-default">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>
            
            <div class="navbar-collapse collapse navbar-responsive-collapse" aria-expanded="true">
                
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Projets <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Voir les projets</a></li>
                            <li><a href="#">Créer un projets</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Demandes <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Voir les demandes</a></li>
                            <li><a href="#">Créer une demande</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Commentaires <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Voir les commentaires</a></li>
                            <!--li><a href="#">Créer une demande</a></li-->
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if( $isConnected ){ ?>
                        <li>
                            <form class="navbar-form">
                                <button class="btn btn-primary" type="submit">se déconnecter</button>
                            </form>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                s'authentifier <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#programmation">s'inscrire</a></li>
                                <li><a href="#applications">se connecter</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
                
            </div>
            
        </div>
    </div>
</div>
