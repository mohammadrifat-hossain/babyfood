# OMS Lite
OMS Lite(V-1.0.0) is an Laravel eCommerce Management website developed by [EOMSBD](https://eomsbd.com). This application bield to manage any king of eCommerce website with lite functionality.

# Deployed On
* [e-Shop Way](https://e-shopway.com/)

* php8.1 /usr/local/bin/composer update
* brew unlink php@7.4 && brew link php@8.1


sudo chgrp -R www-data public/l-build resources/views/l-build
sudo chmod -R ug+rwx public/l-build resources/views/l-build


ALTER TABLE `orders` ADD `admin_id` BIGINT NULL DEFAULT NULL AFTER `attachment`;
ALTER TABLE `users` ADD `order_submitted_at` TIMESTAMP NULL DEFAULT NULL AFTER `address`;

ALTER TABLE `products` ADD `attribute_items_id` TEXT NULL DEFAULT NULL AFTER `regular_price`;


ALTER TABLE `landing_builders` ADD `type` VARCHAR(255) NOT NULL DEFAULT 'Type 1' AFTER `pixel_access_token`, ADD `others` LONGTEXT NULL DEFAULT NULL AFTER `type`;
ALTER TABLE `landing_builders` ADD `product_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `others`;
