Le fichier .htaccess à mettre à la racine d'un projet permet de définir des "règles" de configuration, de routing par défaut au niveau serveur

Je ne maitrise pas trop cette partie car ça devient assez mystique et complexe rapidement car ça touche à de la configuration serveur et c'est plus souvent géré par les responsables infra que par les dév.

La seule ligne qui nous importe c'est 'RewriteRule ^(.*)$ index.php?page=$1' qui va servir pour notre Routeur "maison"

La règle "RewriteRule" permet de réecrire des URL côté serveur, quand on va accèder à l'url http://monsite.com/url/ou/je/suis le serveur va modifier cet url et côté PHP le code recevra l'url 'http://monsite.com/index.php?page=url/ou/je/suis'

Ce n'est plus trop utilisé car désormais les routeurs sont gérés par défaut avec des bundles mais faire son propre routeur ça permet de toucher à la base de la technique derrière le projet pour mieux comprendre comment le tout tiens debout