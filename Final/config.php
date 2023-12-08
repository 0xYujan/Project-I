<?php
	
		$connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
		
		$dbstart = "create database if not exists Futsal1;";
		$connect->query($dbstart);
		mysqli_select_db($connect , "Futsal1");

		$que = "CREATE TABLE IF NOT EXISTS `register` (
			`id` INT(10) NOT NULL AUTO_INCREMENT,
			`fname` VARCHAR(50) NOT NULL,
			`lname` VARCHAR(50) NOT NULL,
			`email` VARCHAR(50) NOT NULL,
			`contact` VARCHAR(50) NOT NULL,
			`password` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE = InnoDB;";
		$connect->query($que);
		
		$que = "CREATE TABLE IF NOT EXISTS `booking` (
			`id` INT(10) NOT NULL AUTO_INCREMENT,
		
			`user` VARCHAR(10) NOT NULL,
			`bookday` DATE NOT NULL,
			`shift` VARCHAR(10) NOT NULL,
			`contact` VARCHAR(15),
			`email` VARCHAR(30),
			`timecheck` INT(30),
			`ctime` INT(30),
			`confirm_key` INT(5),
			PRIMARY KEY (`id`)
		) ENGINE = InnoDB;";

		$connect->query($que);

		$que = "CREATE TABLE IF NOT EXISTS `payment` (
			`id` INT(10) NOT NULL AUTO_INCREMENT,
			`booking_id` INT(10) NOT NULL,
			`user_id` INT(10) NOT NULL,
			`vno` INT(20) NOT NULL,
			`vimgloc` VARCHAR(50) NOT NULL,
			`time` DATETIME NOT NULL,
			PRIMARY KEY (`id`),
			FOREIGN KEY (`booking_id`) REFERENCES `booking`(`id`) ON DELETE CASCADE,
			FOREIGN KEY (`user_id`) REFERENCES `register`(`id`)
			) ENGINE = InnoDB;";
	
		
		$connect->query($que);

		$adminTable = "CREATE TABLE IF NOT EXISTS `admin` (
			`id` INT(10) NOT NULL AUTO_INCREMENT,
			`username` VARCHAR(50) NOT NULL,
			`gmail` VARCHAR(50) NOT NULL,
			`password` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE = InnoDB;";
		$connect->query($adminTable);



		////////////////////     ADMN INSERT  /////////////////////////

		/*
			INSERT INTO `admin` (`username`, `gmail`, `password`) VALUES
				('Yujan', 'yujan@gmail.com', 'yujan@gmail.com'),
				('Sandip', 'sandip@gmail.com', 'sandip@gmail.com'); */

?>