# TeamBuilder
 

## user storie

### Auto-connexion 55min

    DoD
        - Quand l’application démarre, je suis automatiquement connecté en tant qu’utilisateur 
        - L’utilisateur auto-connecté est identifié par son id de base de données 
        - L’id est configuré de manière locale au poste de travail 
        - Le Readme du repo décrit comment configurer l’auto-connexion 

    Verification

        - Faire la vue Homepage.php         => 5min => ok
        - Faire class controller            => 20min
        - Mettre a jour fichier de config   => 10min
        - Mettre en place mécanisme login   => 15min
        - Faire index.php                   => 10min
        - Ecrire Readme                     => 5min


### Liste de membre 45min

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