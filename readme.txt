/* Readme */
THIS REPOSITORY is an experiment!!

Ordner für Galerie namens "picgal" erstellen in public/img/001.jpg bis 016.jpg;
bei mehr Bildern müssen diese in die sqlite3 DB eingefügt werden.

hosts(Windows/System32/drivers/etc) Datei host anlegen
	127.0.0.1       zf3_mirco 
	
In httpd-vhosts.conf(xampp/apache/conf/extra) den VirtualHost anlegen

<VirtualHost *:80>
    ServerName zf3_mirco
    DocumentRoot "A:\devhost\zf3_mirco\public"
    SetEnv APPLICATION_ENV "development"
	<Directory A:\devhost\zf3_mirco\public>
		DirectoryIndex index.php
		AllowOverride All
		Order allow,deny
		Allow from all
		<IfModule mod_authz_core.c>
		Require all granted
		</IfModule>
	</Directory>
</VirtualHost>
