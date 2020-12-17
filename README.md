# Introduction
Prise en main de Symfony 4.4 par la création d'un blog sur les mangas.

# Pré requis

Pour lancer le projet vous aurez besoin de la configuration suivante :
* [Apache](http://httpd.apache.org/docs/2.4/fr/install.html) >= 2
* [MySql](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/) >= 5.7 ou [MariaDB](https://mariadb.com/kb/en/where-to-download-mariadb/#the-latest-packages) >=10.2
* [Php](https://www.php.net/manual/fr/install.php) >= 7.2
* Nodejs + NPM ou Yarn

 [Aide Linux](https://codereviewvideos.com/course/symfony-deployment/video/symfony-4-lamp-stack)
  
# Stack technique
* [Symfony 4.4](https://symfony.com/doc/4.4/setup.html)
* [Twig](https://twig.symfony.com/)
* [Bootstrap 4](https://getbootstrap.com/)
* [Knp_paginator](https://github.com/KnpLabs/KnpPaginatorBundle)
* [Vich_uploader](https://github.com/dustin10/VichUploaderBundle) & [Liip_image](https://symfony.com/doc/master/bundles/LiipImagineBundle/index.html)
* [Select2.js](https://select2.org/getting-started/installation)
* [SwiftMailer](https://symfony.com/doc/4.4/email.html#installation) & [maildev](https://maildev.com/)
* [fzaninotto/Faker](https://github.com/fzaninotto/Faker)
* [Doctrine fixture bundle](https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html)

# Pour initialiser le projet

#### Créer son fichier .env.local si DEV ou éditer le fichier .env si PROD qui contiendra les informations de sa base de données. Sinon les commandes suivantes ne pourront pas fonctionner ! 
Exemple: DATABASE_URL=mysql://db_user:db_password$@127.0.0.1:3306/blog_mangas?serverVersion=10.2.10-MariaDB

```
(option) sudo rm composer.lock symfony.lock
EnvDev: composer install ou EnvProd: composer install --no-dev --optimize-autoloader
Prod: APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
npm install --force ou yarn install --force
npm run build ou yarn build
EnvProd: Configurer votre vHost
```
> Pour les tests avec phpunit il faut configuer les informations de la base de données dans le fichier .env.test

```
Exemple de virtualhost

<VirtualHost *:80>
    ServerName blogmangas.test.com
    ServerAlias blogmangas.test.com

    DocumentRoot "/var/www/html/blogmangas/public/"
        DirectoryIndex index.php
    <Directory "/var/www/html/blogmangas/public/">
        AllowOverride All
        Order Allow,Deny
        Allow from All
        <IfModule mod_rewrite.c>
            Options -MultiViews
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ index.php [QSA,L]
        </IfModule>
    </Directory>

    # uncomment the following lines if you install assets as symlinks
    # or run into problems when compiling LESS/Sass/CoffeeScript assets
    # <Directory /var/www/project>
    #     Options FollowSymlinks
    # </Directory>

    ErrorLog /var/log/httpd/blogmangas_error.log
    CustomLog /var/log/httpd/blogmangas_access.log combined
</VirtualHost>

```

