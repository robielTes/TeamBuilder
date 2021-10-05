# TeamBuilder
 

## user storie

### Auto-connexion 

    DoD
        - Quand l’application démarre, je suis automatiquement connecté en tant qu’utilisateur 
        - L’utilisateur auto-connecté est identifié par son id de base de données 
        - L’id est configuré de manière locale au poste de travail 
        - Le Readme du repo décrit comment configurer l’auto-connexion 

    Verification

        - Faire la vue Homepage.php         => 5min => ok
        - Faire class controller            => 20min => ok
        - Mettre a jour fichier de config   => 10min => ok
        - Mettre en place mécanisme login   => 15min => ok
        - Faire index.php                   => 10min => ok
        - Ecrire Readme                     => 5min => ok

     HowTo

     - Pour être d'utilisateur Auth mets votre id de utilisateur de  base donné dans le fichie env.php.
     - le fichie Authentiation.php cherche le donne de user on utilise le id de fiche env.php et passun fichie index.php
     - le fichie index.php prends les donné et stockes dans le session et passera au Homepage


### Liste de membre 

    DoD
        - Quand je suis connecté, j’ai un lien vers la page de liste des membres 
        - La liste est triée par ordre alphabétique  
        - La liste montre les équipes auxquelles chaque membre appartient 

    Verification

        - Faire la vue Member_list.php                      => 15
        - Faire controller memberctl                        => 20
        - Créer le lien vers la page                        => 15
        - Mettre à jour index.php                           => 15
        - Créer relation $membre->team() return array(Team) => 20