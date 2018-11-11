# pizza store project

BASE DE DONNEES
- récupérer un backup de la base de donnée
Pour recreer la structure de la base à tout moment

PHP
 On va creer quelques fichiers / dossiers :
- config/databases.php --> Connecion à la base de donnés
- config/config.php --> Stocke toutes les variavles globales
- partials/header.php --> le header
- partials/footer.php --> le footer
- index.php --> page accueil
- pizza_list.php --> Liste de toutes les pizzas
- pizza_detail.php --> précision d'une pizza seule
- 

FRONT
- assets / --> dossier qui contient le css ; le js et les images


## Ajout d'une pizza

- créer une page update pour ajouyter une pizza
- titre : Ajouter une pizza
- Ajouter formulaire :

    - Nom :
    - Prix : (entre 5 et 19,99 €)
    - Image :
    - Description :
    - Catégories : via un select
    - Bouton pour push

- traitement du formulaire (vériufier les données)
- modif de base de données avec description (long TEXT) et catégorie (VARCHAR) dans la table pizza
- Ajouter la pizza dans la base








