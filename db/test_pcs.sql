/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.4.22-MariaDB : Database - test_pcs_group
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`product_id`,`quantity`,`created_at`,`updated_at`,`deleted_at`) values 
(42,7,1,1,'2023-01-31 13:58:43','2023-01-31 13:59:14','2023-01-31 13:59:14'),
(43,7,3,1,'2023-01-31 13:59:09','2023-01-31 13:59:16','2023-01-31 13:59:16'),
(44,7,1,2,'2023-01-31 14:02:02','2023-01-31 14:03:59','2023-01-31 14:03:59'),
(45,7,2,1,'2023-01-31 14:04:05','2023-01-31 14:04:27','2023-01-31 14:04:27'),
(46,7,26,1,'2023-01-31 14:04:14','2023-01-31 14:04:27','2023-01-31 14:04:27'),
(47,16,1,2,'2023-01-31 14:44:19','2023-01-31 14:45:06','2023-01-31 14:45:06'),
(48,16,2,2,'2023-01-31 14:44:20','2023-01-31 14:45:06','2023-01-31 14:45:06');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values 
(1,'admin','Administrator'),
(2,'members','General User'),
(5,'superadmin','Super Administratora');

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

insert  into `login_attempts`(`id`,`ip_address`,`login`,`time`) values 
(34,'::1','hello@cindalogikagrafia.com',1675151136);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(1,'20181211100537','IonAuth\\Database\\Migrations\\Migration_Install_ion_auth','','IonAuth',1646100541,1);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `total_kupon` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`description`,`total_kupon`,`total_price`,`created_at`,`updated_at`,`deleted_at`) values 
(21,7,'[\"Television - TV 4K Smart 50 inci x5\",\"Laptop - MacBook Pro 15.6 inci x1\"]',530,52499994.00,'2023-01-31 08:54:17','2023-01-31 13:14:20',NULL),
(22,7,'[\"Smartphone - Model iPhone terbaru x4\",\"Laptop - MacBook Pro 15.6 inci x4\"]',1067,99999999.99,'2023-01-31 11:58:03','2023-01-31 09:58:03',NULL),
(27,7,'[\"Television - TV 4K Smart 50 inci x1\"]',75,7499999.00,'2023-01-31 13:45:35','2023-01-31 13:45:35',NULL),
(28,7,'[\"Mouse - Logitech Mouse x1\",\"Kettle - Kettle Philips HD9316\\/08 x1\"]',16,1547999.00,'2023-01-31 14:04:27','2023-01-31 14:04:27',NULL),
(29,16,'[\"Television - TV 4K Smart 50 inci x2\",\"Mouse - Logitech Mouse x2\"]',152,15095998.00,'2023-01-31 14:45:06','2023-01-31 14:45:06',NULL);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`description`,`price`,`quantity`,`image`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Television','TV 4K Smart 50 inci',7499999.00,20,'1.jpg','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(2,'Mouse','Logitech Mouse',48000.00,15,'2.jpg','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(3,'Smartphone','Model iPhone terbaru',11499999.00,25,'3.jpg','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(4,'Tablet','iPad Pro 10 inci',8499999.00,18,'4.jpg','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(5,'Gaming Console','PlayStation 5',7499999.00,15,'5.jpg','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(6,'Kamera','Kamera DSLR Canon EOS',14499999.00,12,'6.jpg','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(7,'Speaker Bluetooth','Speaker JBL Flip 5',1999999.00,30,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(8,'Headphone','Headphone Beats Solo Pro',4499999.00,20,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(9,'Home Theater','Home Theater LG SK9',5499999.00,10,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(10,'Air Conditioner','AC 1/2 PK Panasonic',3999999.00,5,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(11,'Blender','Blender Philips HR2160',999999.00,30,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(12,'Microwave','Microwave LG MS4296OSS',1499999.00,15,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(13,'Oven','Oven Panasonic NBG100P',2499999.00,5,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(14,'Vacuum Cleaner','Vacuum Cleaner Dyson V11',9499999.00,20,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(15,'Blender','Blender Cosori CO171-GK',1999999.00,15,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(16,'Smart Watch','Smart Watch Apple Watch Series 6',7499999.00,25,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(17,'Fitness Tracker','Fitness Tracker Fitbit Charge 4',2499999.00,20,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(18,'Air Purifier','Air Purifier Philips AC1215/20',2499999.00,10,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(19,'Washing Machine','Mesin Cuci LG WC-14S4W',5499999.00,5,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(20,'Rice Cooker','Rice Cooker Philips HD3037',1499999.00,15,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(21,'Slow Cooker','Slow Cooker Crock-Pot SCCPVC605-S',2499999.00,10,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(22,'Iron','Setrika Uap Philips GC5039/30',1999999.00,20,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(23,'Hair Dryer','Hair Dryer Philips BHD006/00',1499999.00,15,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(24,'Hair Straightener','Hair Straightener Philips BHS384/00',1499999.00,10,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(25,'Toaster','Toaster Philips HD4815',999999.00,20,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(26,'Kettle','Kettle Philips HD9316/08',1499999.00,15,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(27,'Coffee Maker','Coffee Maker DeLonghi EC155',2499999.00,10,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(100) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `login_image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `settings` */

insert  into `settings`(`id`,`app_name`,`favicon`,`logo`,`login_image`,`created_at`,`updated_at`) values 
(1,'Test PCS Group Backend','favicon.png','logo.png','login_image.jpg','2021-06-21 15:16:05','2023-01-30 12:24:09');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `activation_selector` (`activation_selector`),
  UNIQUE KEY `forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`email`,`activation_selector`,`activation_code`,`forgotten_password_selector`,`forgotten_password_code`,`forgotten_password_time`,`remember_selector`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values 
(7,'::1','tiotio179@gmail.com','$2y$12$.g.IYddnP9dCU4rkTSyTLe23IP3D3xJmf/hYcznl509OlCgDxuH8G','tiotio179@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1655112525,1675151143,1,'Muhamad Odhie','Prasetio','CLG','089520003191'),
(15,'::1','member1@test.com','$2y$10$PMhWo7cQGG3r9.91X.CPKOsDrDV5.iPWg4kOUeqIVnMkon.A7Sm0u','member1@test.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1675150517,1675151119,1,'Member','1','PCS Group',''),
(16,'::1','member2@test.com','$2y$10$ZLIclABJ41.9GlnhuxUshOPCjKJDv2IE4HU0BcYbEVxAtIaQ0bvzu','member2@test.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1675150580,1675150679,1,'member','2','PCS Group','');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_groups_user_id_foreign` (`user_id`),
  KEY `users_groups_group_id_foreign` (`group_id`),
  CONSTRAINT `users_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(109,15,2),
(110,16,2),
(111,7,1),
(112,7,5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
