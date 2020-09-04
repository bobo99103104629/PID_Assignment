<?php

$sql = "CREATE TABLE `weather`.CITY(
        citySite VARCHAR(20) PRIMARY KEY,
        cityName VARCHAR(20) NOT NULL
        );";
$result = $conn->query($sql);

$sql = "CREATE TABLE `weather`.TODAY(
        wId int AUTO_INCREMENT PRIMARY KEY,
        citySite VARCHAR(20) ,
        uptime VARCHAR(50) DEFAULT NULL,
        temp FLOAT DEFAULT NULL,
        weather VARCHAR(50) DEFAULT NULL,
        FOREIGN KEY(citySite) REFERENCES CITY(citySite)
        );";   
    $result = $conn->query($sql);
$sql = "CREATE TABLE `weather`.twoDays(
        cityName VARCHAR(20) NOT NULL,
        strtime VARCHAR(50) DEFAULT NULL,
        endtime VARCHAR(50) DEFAULT NULL,
        weather VARCHAR(100) DEFAULT NULL
        );";   
    $result = $conn->query($sql);
$sql = "CREATE TABLE `weather`.week(
        cityName VARCHAR(20) NOT NULL,
        strtime VARCHAR(50) DEFAULT NULL,
        endtime VARCHAR(50) DEFAULT NULL,
        weather VARCHAR(100) DEFAULT NULL
        );";   
    $result = $conn->query($sql);
$sql = "CREATE TABLE `weather`.rain(
        cityName VARCHAR(20) NOT NULL,
        allSite VARCHAR(20) NOT NULL,
        town VARCHAR(20) NOT NULL,
        rainHour VARCHAR(20) NOT NULL,
        rainDay VARCHAR(20) NOT NULL,
        obsTime VARCHAR(20) NOT NULL
        );";   
    $result = $conn->query($sql);
 
     
?>