# galerie_MVC_MongoDB

La liste des fonctionnalités réalisées :

* Création d'une galerie
* Choix permis plusieurs galeries créées
* Ajout de photos par upload (glisser déposer)
* Drag'n drop pour mettre a jour les photos d'une galerie
* Carousel pour voir les photos de la galerie


Remarques :

Pour lancer la base de données, mettez vous à la racine du projet (dans le dossier galerie), et lancez cette commande : 

'mongod --dbpath data/db' (linux/macOS)
'mongod.exe --dbpath data\db' (windows)


Une base de données pré-rempli sera prise en compte.


Les fichiers sources se trouvent dans le dossier 'app'.

Si jamais la base de données ne fonctionne pas pour X ou Y raison: voici la structure a reproduire :

dbname : 'galerie'
collections : 'galeries'
