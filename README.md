# Introduction
Prise en main de Symfony 4.4 par la création d'un blog sur les mangas.

# Pré requis

Pour lancer le projet vous aurez besoin de la configuration suivante :
* [Apache](http://httpd.apache.org/docs/2.4/fr/install.html) >= 2
* [MySql](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/) >= 5.7 ou [MariaDB](https://mariadb.com/kb/en/where-to-download-mariadb/#the-latest-packages) >=10.2
* [Php](https://www.php.net/manual/fr/install.php) >= 7.2

 [Aide Linux](https://www.digitalocean.com/community/tutorials/comment-installer-la-pile-linux-apache-mysql-php-lamp-sur-un-serveur-ubuntu-18-04-fr)
  ou [Aide Mac](https://documentation.mamp.info/en/MAMP-Mac/Installation/) 
  
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

#### Créer son fichier .env.local qui contiendra les informations de sa base de données. Sinon les commandes suivantes ne pourront pas fonctionner !

```
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```
> Pour les tests avec phpunit il faut configuer les informations de la base de données dans le fichier .env.test
