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

----------------------
UTILISATION

	- URL du site : http://URL_SERVEUR/applistage/public
	- Par défaut, le compte admin est le suivant :
		- utilisateur : admin
		- mot de passe : Admin
 
