---------------------------------------------------------------------
|																	|
|							APPLISTAGE								|
|																	|
|--------------------------------------------------------------------

				Auteurs : Etienne DEBOST & Nicolas LE GALL
					  Yoann GUYADER & Valentin DUPAS
							Version : 1

----------------------
INSTALLATION

	- Récupérer l'archive ou cloner le dépôt GIT
	- Renommer le dossier en 'applistage'
	- L'uploader sur le serveur dans l'enplacement désiré
	- Modifier les droits en 777 sur les dossiers :
		- fuel/app/logs
		- public/
		- fuel/packages/pdf/lib/tcpdf/cache
	- Activer dans la configuration du serveur web :
		- url_rewrite (Apache)
		- fileinfo (php.ini)
	- Importer le script dans la base de données via PhpMyAdmin
	- Vous devez également modifier les valeurs d'accès à la base de 
	données dans les fichiers de configuration suivant :
		- fuel/app/config/db.php
		- fuel/app/config/development/db.php
		- fuel/app/config/production/db.php
	Vous aurez à renseigner le serveur SQL ainsi que les identifiants
	pour s'y connecter.

----------------------
UTILISATION

	- URL du site : http://URL_SERVEUR/applistage/public
	- Par défaut, le compte admin est le suivant :
		- utilisateur : admin
		- mot de passe : Admin
 
----------------------
CONFIGURATION

	- Se rendre dans le panel d'admin
	- Cliquer sur "Modifier la configuration" en bas de page
	- Paramêtrer la table config avant import fichier csv des étudiants
	- Importer csv étudiant

----------------------
CHANGER URL

	Si vous ne souhaitez pas utiliser http://URL_SERVEUR/applistage/public
	mais http://URL_SERVEUR/, il faut changer dans la configuration du
	serveur web le document.root vers le dossier où se situe le dossier
	d'applistage (/var/www/applistage/public).
