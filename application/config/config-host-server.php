<?php

/**

HOSTS: 

127.0.1.1       agenda-codeigniter

APACHE:

<VirtualHost *:80>
    ServerName agenda-codeigniter
    ServerAlias agenda-codeigniter

    DocumentRoot /var/www/agenda-codeigniter
    <Directory /var/www/agenda-codeigniter>
       # enable the .htaccess rewrites
        AllowOverride All
        Order allow,deny
        Allow from All
    </Directory>

    ErrorLog /var/log/apache2/project_error.log
    CustomLog /var/log/apache2/project_access.log combined
</VirtualHost>


*/
