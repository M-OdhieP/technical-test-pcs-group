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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`product_id`,`quantity`,`created_at`,`updated_at`,`deleted_at`) values 
(18,7,1,11,'2023-01-30 15:26:52','2023-01-30 16:29:48',NULL),
(19,7,2,3,'2023-01-30 15:40:27','2023-01-30 17:01:40','2023-01-30 17:01:40'),
(20,7,3,2,'2023-01-30 15:40:28','2023-01-30 16:30:07',NULL),
(21,0,0,2,'2023-01-30 15:48:48','2023-01-30 15:48:48',NULL),
(22,0,0,2,'2023-01-30 15:49:02','2023-01-30 15:49:02',NULL);

/*Table structure for table `example_table` */

DROP TABLE IF EXISTS `example_table`;

CREATE TABLE `example_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

/*Data for the table `example_table` */

insert  into `example_table`(`id`,`name`,`email`,`message`,`image`,`created_at`,`updated_at`,`deleted_at`) values 
(65,'Muhamad Odhie Prasetio','tiotio179@gmail.com','test messagetest messagetest messagetest messagetest messagetest messagetest messagemessagetest messagetest messagemessagetest messagetest messagemessagetest messagetest messagemessagetest messagetest message','1672128625_df942b237214e5fec7e0.png','2022-12-19 11:37:51','2023-01-28 13:20:46',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

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
(1,'Television','TV 4K Smart 50 inci',7499999.00,20,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(2,'Laptop','MacBook Pro 15.6 inci',14999999.00,15,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(3,'Smartphone','Model iPhone terbaru',11499999.00,25,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(4,'Tablet','iPad Pro 10 inci',8499999.00,18,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(5,'Gaming Console','PlayStation 5',7499999.00,15,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
(6,'Kamera','Kamera DSLR Canon EOS',14499999.00,12,'','2023-01-30 12:40:45','2023-01-30 12:45:33',NULL),
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`email`,`activation_selector`,`activation_code`,`forgotten_password_selector`,`forgotten_password_code`,`forgotten_password_time`,`remember_selector`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values 
(7,'::1','hello@cindalogikagrafia.com','$2y$12$I7Up/t2OCUHr6YBXSbR3suMD0QlY8LodCAlxKBafpcjabt2889hCC','hello@cindalogikagrafia.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1655112525,1675071194,1,'Cinda Logika',' Grafia','CLG','628117911121'),
(12,'::1','dinasbmbk@lampungprov.go.id','$2y$12$gZHGhGp3XROmgB6NjPvpuO5/xEdoB.kPgGqcvVnmXTTN1/di0B72i','dinasbmbk@lampungprov.go.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1666670120,1669363889,1,'BMBK','Provinsi Lampung','BMBK Provinsi Lampung','(0721) 702684'),
(13,'::1','admin.bmbk@gmail.com','$2y$10$0q0gkLG.h9pRymKK0WaaAOofiT9NuDT84/LN4GUw4gxxDL1eP7Bzq','admin.bmbk@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1668410688,1668411119,1,'Admin','BMBK','BMBK Provinsi Lampung','(514) 514-5385');

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
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(71,7,1),
(72,7,5),
(82,12,1),
(108,13,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
