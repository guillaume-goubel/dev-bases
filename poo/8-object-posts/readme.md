***Objectif*** : 

> Créer et afficher des :
- Articles
- Pages
- Pages de documentation 
- Utilisateur


*Page* PARENT
- titre
- Permalien ou slug
- contenu
- auteur
- date création 
- date de publication
- catégories
- mots clés
- Type (article / page / )

*Article* 
- titre
- Permalien ou slug
- contenu
- auteur
- date création 
- date de publication
- catégories
- mots clés

*Utilisateur*
- Nom 
- Prénom

------------------------------------------------------------------------------

BDD
> Table post
- Id (bigInt)
- Users Id
- title (NN varchar 255)
- slug  (NN varchar 255)
- content (TEXT)
- creation date ()
- publication date
- categorie (Text default =[''])
- Keywords (Text default =[''])
- type (NN VARCHAR 7 )
- State (boolean publié / pas publié)

> Table Users
- Id (UN AI smallINT3)
- firstname (NN VARCHAR 30) 
- lastname (NN VARCHAR 30) 
- email (NN UN VARCHAR 160)
- pass (NN varchar 255)





