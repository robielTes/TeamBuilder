# TeamBuilder
 

## user storie

### Auto-connexion 

    DoD
        - Quand l’application démarre, je suis automatiquement connecté en tant qu’utilisateur 
        - L’utilisateur auto-connecté est identifié par son id de base de données 
        - L’id est configuré de manière locale au poste de travail 
        - Le Readme du repo décrit comment configurer l’auto-connexion 

     - Pour être d'utilisateur Auth mets votre id de utilisateur de  base donné dans le fichie env.php.
     - le fichie Authentiation.php cherche le donne de user on utilise le id de fiche env.php et passun fichie index.php
     - le fichie index.php prends les donné et stockes dans le session et passera au Homepage


### Liste de membre 

    DoD
        - Quand je suis connecté, j’ai un lien vers la page de liste des membres 
        - La liste est triée par ordre alphabétique  
        - La liste montre les équipes auxquelles chaque membre appartient 


## Status d'un membre

    DoD
        Le Readme du repository me donne toutes les informations nécessaires à la mise en place de la basede données
        La création ou modification de la base de donnée ne se fait que par du code (script SQL, code PhP, ...)
        La base de donnée résultant de la mise en place contient les trois status 'Actif', 'Inactif' et 'Banni'
        La modélisation tient compte du fait que la liste des status va très certainement évoluer dans le futur

     - Pour ajouter plus d'états, vous devez créer un fichier .php avec le lien vers le modèle d'état.
     - Après cela, appelez la méthode make et passez-lui les paramètres que vous voulez.
     - Après cela, appelez la méthode create pour le stocker dans la base de données.
