/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.19 : Database - ciproject
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ciproject` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ciproject`;

/*Table structure for table `tbl_board` */

DROP TABLE IF EXISTS `tbl_board`;

CREATE TABLE `tbl_board` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sts` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_board` */

insert  into `tbl_board`(`id`,`name`,`sts`) values (1,'Barisal',1),(2,'Chittagong',1),(3,'Comilla',1),(4,'Dhaka',1),(5,'Jessore',1),(6,'Mymensingh',1),(7,'Rajshahi',1),(8,'Sylhet',1),(9,'Dinajpur',1);

/*Table structure for table `tbl_district` */

DROP TABLE IF EXISTS `tbl_district`;

CREATE TABLE `tbl_district` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `division` int(5) DEFAULT NULL,
  `sts` tinyint(1) DEFAULT '1',
  `e_by` int(5) DEFAULT NULL,
  `e_date` datetime DEFAULT NULL,
  `u_by` int(5) DEFAULT NULL,
  `u_date` datetime DEFAULT NULL,
  `d_by` int(5) DEFAULT NULL,
  `d_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_district` */

insert  into `tbl_district`(`id`,`name`,`division`,`sts`,`e_by`,`e_date`,`u_by`,`u_date`,`d_by`,`d_date`) values (1,'Dhaka',1,1,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Faridpur',1,1,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Gazipur',1,1,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Gopalgonj',1,1,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Kishoregonj',1,1,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Comilla',2,1,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Chandpur',2,1,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Laxmipur',2,1,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Noakhali',2,1,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Feni',2,1,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Rajshahi',4,1,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Bogura',4,1,NULL,NULL,NULL,NULL,NULL,NULL),(13,'Pabna',4,1,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Natore',4,1,NULL,NULL,NULL,NULL,NULL,NULL),(15,'Khulna',3,1,NULL,NULL,NULL,NULL,NULL,NULL),(16,'Kushtia',3,1,NULL,NULL,NULL,NULL,NULL,NULL),(17,'Magura',3,1,NULL,NULL,NULL,NULL,NULL,NULL),(18,'Narail',3,1,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_division` */

DROP TABLE IF EXISTS `tbl_division`;

CREATE TABLE `tbl_division` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sts` tinyint(1) DEFAULT '1',
  `e_by` int(5) DEFAULT NULL,
  `e_date` datetime DEFAULT NULL,
  `u_by` int(5) DEFAULT NULL,
  `u_date` datetime DEFAULT NULL,
  `d_by` int(5) DEFAULT NULL,
  `d_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_division` */

insert  into `tbl_division`(`id`,`name`,`sts`,`e_by`,`e_date`,`u_by`,`u_date`,`d_by`,`d_date`) values (1,'Dhaka',1,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Chittagong',1,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Khulna',1,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Rajshahi',1,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Barisal',1,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Sylhet',1,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Rangpur',1,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Mymensingh',1,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_education` */

DROP TABLE IF EXISTS `tbl_education`;

CREATE TABLE `tbl_education` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `exam_id` int(5) DEFAULT NULL,
  `uni_id` int(5) DEFAULT NULL,
  `board_id` int(5) DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_education` */

insert  into `tbl_education`(`id`,`user_id`,`exam_id`,`uni_id`,`board_id`,`result`) values (1,1,0,0,0,''),(2,2,3,2,4,'4.00');

/*Table structure for table `tbl_exam` */

DROP TABLE IF EXISTS `tbl_exam`;

CREATE TABLE `tbl_exam` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `sts` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_exam` */

insert  into `tbl_exam`(`id`,`name`,`sts`) values (1,'BSC',1),(2,'MSC',1);

/*Table structure for table `tbl_training` */

DROP TABLE IF EXISTS `tbl_training`;

CREATE TABLE `tbl_training` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `training_name` varchar(200) DEFAULT NULL,
  `training_details` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_training` */

/*Table structure for table `tbl_university` */

DROP TABLE IF EXISTS `tbl_university`;

CREATE TABLE `tbl_university` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_university` */

insert  into `tbl_university`(`id`,`name`) values (1,'Dhaka University'),(2,'Chittagong University'),(3,'Noakhali Science And Technology University'),(4,'Rajshahi University'),(5,'BUET'),(6,'CUET'),(7,'KUET'),(8,'RUET');

/*Table structure for table `tbl_upazila` */

DROP TABLE IF EXISTS `tbl_upazila`;

CREATE TABLE `tbl_upazila` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `division` int(5) DEFAULT NULL,
  `district` int(5) DEFAULT NULL,
  `sts` tinyint(1) DEFAULT '1',
  `e_by` int(5) DEFAULT NULL,
  `e_date` datetime DEFAULT NULL,
  `u_by` int(5) DEFAULT NULL,
  `u_date` datetime DEFAULT NULL,
  `d_by` int(5) DEFAULT NULL,
  `d_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_upazila` */

insert  into `tbl_upazila`(`id`,`name`,`division`,`district`,`sts`,`e_by`,`e_date`,`u_by`,`u_date`,`d_by`,`d_date`) values (1,'Savar',1,1,1,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Demra',1,1,1,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Dhamrai',1,1,1,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Dohar',1,1,1,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Gazipur',1,3,1,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Kaliakair',1,3,1,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Kapasia',1,3,1,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Kishoregong',1,5,1,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Bazitpur',1,5,1,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Faridpur',1,2,1,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Boalmari',1,2,1,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Saltha',1,2,1,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbladmin` */

DROP TABLE IF EXISTS `tbladmin`;

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(120) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbladmin` */

insert  into `tbladmin`(`id`,`userName`,`password`) values (1,'admin','Test@12345');

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `division` int(5) DEFAULT NULL,
  `district` int(5) DEFAULT NULL,
  `upazila` int(5) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `language_bangla` varchar(50) DEFAULT NULL,
  `language_english` varchar(50) DEFAULT NULL,
  `language_french` varchar(50) DEFAULT NULL,
  `photo_actual` varchar(250) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `cv_actual` varchar(250) DEFAULT NULL,
  `cv_attach` varchar(250) DEFAULT NULL,
  `training` int(5) DEFAULT NULL,
  `block_sts` tinyint(1) DEFAULT '2',
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `u_date` timestamp NULL DEFAULT NULL,
  `b_by` int(5) DEFAULT NULL,
  `b_date` timestamp NULL DEFAULT NULL,
  `d_by` int(5) DEFAULT NULL,
  `d_date` timestamp NULL DEFAULT NULL,
  `sts` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`id`,`email`,`name`,`mobile`,`password`,`division`,`district`,`upazila`,`address`,`language_bangla`,`language_english`,`language_french`,`photo_actual`,`photo`,`cv_actual`,`cv_attach`,`training`,`block_sts`,`reg_date`,`u_date`,`b_by`,`b_date`,`d_by`,`d_date`,`sts`) values (1,'t@gmail.com','test','1780178156','asm@@@',1,1,1,'Dhaka',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2020-10-10 19:38:50',NULL,NULL,NULL,NULL,NULL,1),(2,'testtest@gmail.com','testtest','1780178144','asm@@@',1,1,1,'Mirpur','Bangla','English',NULL,'color','color2020-10-10.jpg','Jave_servlet_assignment','Jave_servlet_assignment2020-10-10.docx',0,2,'2020-10-10 19:41:52',NULL,NULL,NULL,NULL,NULL,1);

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(200) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `mobileNumber` char(12) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` int(1) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tblusers` */

insert  into `tblusers`(`id`,`firstName`,`lastName`,`emailId`,`mobileNumber`,`userPassword`,`regDate`,`isActive`,`lastUpdationDate`) values (1,'Anuj','Kumar','test@gmail.com','1234567890','Test@12345','2018-12-17 18:30:00',1,'2018-12-25 06:15:43'),(2,'Sarita','Pandey','phpgurukulofficial@gmail.com','1234567890','Test@123','2018-12-18 17:40:40',1,'2018-12-22 05:33:41'),(3,'Testuser','User','user@test.com','1111111112','Test@12345','2018-12-25 17:57:43',1,'2018-12-25 18:36:18'),(4,'Abc','Xyz','abc@xyz.com','1234567908','Test@123','2018-12-25 18:43:33',1,NULL),(5,'Mariom','Mishu','mishu.cste08@gmail.com','1780178134','Abb@12345','2020-10-06 01:00:26',1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
