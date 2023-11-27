<?php
		
		$connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
		
		$dbstart = "create database if not exists Futsal;";
		$connect->query($dbstart);
		mysqli_select_db($connect , "Futsal");

		$que = "create table if not exists `register` ( `id` INT(10) NOT NULL AUTO_INCREMENT , 
														`fname` VARCHAR(50) NOT NULL , 
														`lname` VARCHAR(50) NOT NULL , 
														`email` VARCHAR(50) NOT NULL , 
														`contact` VARCHAR(50) NOT NULL , 
														`password` VARCHAR(50) NOT NULL , 
														PRIMARY KEY (`id`)) ENGINE = InnoDB;";
		$connect->query($que);
		
		$que = "create table if not exists `booking` ( 	`id` INT(10) NOT NULL AUTO_INCREMENT , 
														`user` VARCHAR(10) NOT NULL , 
														`bookday` DATE NOT NULL , 
														`shift` VARCHAR(10) NOT NULL , 
														`contact` VARCHAR(15), 
														`email` VARCHAR(30),
														`timecheck` INT(30), 
														`ctime` INT(30),
														`confirm_key` INT(5), 
														`vno` INT(20),
														`vimgloc` VARCHAR(50),
														PRIMARY KEY (`id`)) ENGINE = InnoDB;";
		$connect->query($que);
	

?>