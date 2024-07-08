# rupaporup.com
rupaporup.com(V-1.0.0) is an Laravel eCommerce Management website developed by [EOMSBD](https://eomsbd.com). This application bield to manage any king of eCommerce website with lite functionality.

# Deployed On
* [rupaporup.com](https://rupaporup.com)

* php8.1 /usr/local/bin/composer update
* brew unlink php@7.4 && brew link php@8.1

sudo chgrp -R www-data public/l-build resources/views/l-build
sudo chmod -R ug+rwx public/l-build resources/views/l-build

c:\xampp-8.1\php\php.exe  c:\ProgramData\ComposerSetup\bin\composer.phar instal
cp .env.example .env
php artisan key:generate
php artisan serve


ALTER TABLE `categories` ADD `home_block` TINYINT NOT NULL DEFAULT '0' AFTER `feature`; 
