DROP DATABASE IF EXISTS `students_funding_system`;
CREATE DATABASE IF NOT EXISTS `students_funding_system` DEFAULT CHARACTER SET 'UTF8';
USE `students_funding_system`;


CREATE TABLE IF NOT EXISTS accounts(
userid INT UNSIGNED AUTO_INCREMENT KEY,
username VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(100) NOT NULL,
headimg_url VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS productions(
product_id INT UNSIGNED AUTO_INCREMENT KEY,
userid INT UNSIGNED NOT NULL,
title VARCHAR(50) NOT NULL,
description VARCHAR(500) NOT NULL,
category VARCHAR(50) NOT NULL,
url VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS comments(
id INT UNSIGNED AUTO_INCREMENT KEY,
product_id UNSIGNED NOT NULL,
userid INT UNSIGNED NOT NULL,
content VARCHAR(255) NOT NULL
);