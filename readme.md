# Installation

### Cmder
http://cmder.net/

### Git
https://gitforwindows.org/

### Visual studio
*Run as administrator*

1. https://www.microsoft.com/fr-fr/download/details.aspx?id=14632
2. https://www.microsoft.com/fr-FR/download/details.aspx?id=40784
3. https://www.microsoft.com/en-us/download/details.aspx?id=48145
4. https://www.microsoft.com/en-us/download/details.aspx?id=48145

### Wamp
*Run as administrator*

http://www.wampserver.com/

### Composer
*Run as administrator*
 
https://getcomposer.org/doc/00-intro.md#installation-windows

# Configuration

### Environnement système
* Variable d’environnement windows 
    * php
    * mysql 
    * composer
    
### Lancement
* Lancer les serveurs sur Wamp

### Dépendances
* Modifier le fichier .env
* php artisan config:cache
* composer install

### Base de données
* Créer la base de données
* php artisan migrate:fresh —seed

### Vhost
* Ajouter le vhosts
    * En passant par wamp
    * Manuellement
    ```
	    <VirtualHost *:80>
		    DocumentRoot « C:/app/soonaduq/public » 
		    ServerName soonduq.essouna
		    <Directory  "C:/app/soonaduq/public">
			    AllowOverride All
			    Require local
		    </Directory>
	    </VirtualHost>
    ```
    * Ajouter le /etc/hosts
* Aller sur web2desk (ou récupérer par mail)
* Enjoy
