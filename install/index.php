<?php
	require 'php/config.php';
	
	//Create Databsse if not Exsit
	$create_database = "CREATE DATABASE ".$mySql['DATABASE'];
	
	//Create Table if not Exsit
	//USER: FIRST_NAME, LAST_NAME, UNAME ,EMAIL, MCUSER, UUID. PASSWORD
	$create_table_user = "CREATE TABLE ".$mySqlTables['USER']."(id int NOT NULL AUTO_INCREMENT, FIRST_NAME text(30), LAST_NAME text(30), UNAME varchar(100), EMAIL varchar(100), MCUSER varchar(16), UUID varchar(100), PASSWORD varchar(255), Rank_id int(20),PRIMARY KEY(id))";
	$create_table_cat = "CREATE TABLE ".$mySqlTables['Cat']."(id int NOT NULL AUTO_INCREMENT, NAME varchar(255), DESC varchar(255), PRIMARY KEY(id))";
	$create_table_forums = "CREATE TABLE ".$mySqlTables['Forums']."(id int NOT NULL AUTO_INCREMENT, CAT_ID int(20), Forum_Name varchar(255), Forum_DESC varchar(255), )";
	$create_table_topic = "CREATE TABLE ".$mySqlTables['Topics']."(id int NOT NULL AUTO_INCREMENT, Forum_ID int(20), Topic_Name varchar(255), Topic_Content LONGTEXT, Type Enum('o','r'), Orignal_Post int(100), Author text)";
	// a= ADMINISTRATOR d= DONOR S=Special m=MEMBER
	$create_table_ranks = "CREATE TABLE ".$mySqlTables['Ranks']."(id int NOT NULL AUTO_INCREMENT, name text, Display_Name text, Rank Enum('a','d','s','m'), PRIMARY KEY(id))";
	
	$admin_rank = "INSERT INTO ".$mySqlTables['Ranks']."(name, Display_Name, Rank) VALUES ('Admin','ADMIN','a')";
	$admin_hashed_password = hash('sha256', "adminisrator");
	$admin = "INSERT INTO ".$mySqlTables['USER']."(FIRST_NAME, LAST_NAME, UNAME, EMAIL, MCUSER, UUID, PASSWORD, Rank_id) values ('Admin', 'Admin' ,'Administrator', 'admin@admin.com, 'admin', '-----', '".$admin_hashed_password."')";
	
	
	sql_query($create_database);
	sql_query($create_table_user);
	sql_query($create_table_cat);
	sql_query($create_table_forums);
	sql_query($create_table_topic);
	sql_query($create_table_ranks);	
	sql_query($admin_rank);
	sql_query($admin);
?>
