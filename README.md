# Projet de qualité logicielle réalisé par Olivier Schyns

Le site a été réalisé sous wamp et mySQL.
Les tests unitaires on été réalisé via PHPUnit.

Pour fonctionner, le dossier du projet doit être placé dans le répertoire wamp/www/
On obtient alors le hiérarchie suivante: wamp/www/suivi_client/

Il faut ensuite exécuter le script data_gen.sql pour générer la base de données.
Vous pouvez aussi exécuter le script data_test.sql pour générer des données de tests.

Pour accéder à la page d'accueil, il faut ce rendre à l'adresse: localhost/suivi_client/
À partir de là, vous pourrez vous connecter en tant que super-utilisateur:
    Login:      root@root
    Password:   root

Si vous avez exécuté le script data_test.sql,
vous pouvez aussi vous connecter en tant qu'utilisateur simple:
    Login:      jean.dupont@mail.fr
    Password:   123
ou
    Login:      pierre.dubois@mail.fr
    Password:   123


Seul les super-utilisateurs peuvent créer/modifier/supprimer des projets.
Les utilisateurs simples peuvent ajouter/modifier/supprimer des demandes sur les projets auxquels ils ont accès.
Les format de Date accepté sont yyyy-mm-dd ou dd/mm/yyyy, tout autre format est refusé.
Les fichiers index.php présent dans chaqu'un des répertoires du projets permettent de rediriger l'utilisateur vers la page d'accueil pour éviter qu'il n'ai accès aux sources du site.
Dans la liste des utilisateurs, les super-utilisateurs sont marqués en vert.
Les demandes dont le temps de livraison désiré a été dépassé sont marquées en rouge.