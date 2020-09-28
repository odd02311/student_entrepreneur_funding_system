DROP DATABASE IF EXISTS `students_funding_system`;
CREATE DATABASE IF NOT EXISTS `students_funding_system` DEFAULT CHARACTER SET 'UTF8';
USE `students_funding_system`;

DROP table IF EXISTS accounts;
DROP table IF EXISTS productions;
DROP table IF EXISTS comments;
DROP table IF EXISTS operations;
DROP table IF EXISTS  operation_types;

CREATE TABLE IF NOT EXISTS accounts(
user_id INT UNSIGNED AUTO_INCREMENT KEY,
username VARCHAR(40) NOT NULL,
password VARCHAR(100) NOT NULL,
is_admin INT UNSIGNED DEFAULT 0,
headimg_url VARCHAR(255) DEFAULT "/img/headimg/0.png"
);

CREATE TABLE IF NOT EXISTS productions(
product_id INT UNSIGNED AUTO_INCREMENT KEY,
username VARCHAR(40) NOT NULL,
title VARCHAR(50) NOT NULL,
description VARCHAR(500) NOT NULL,
category VARCHAR(50) NOT NULL,
pic_url VARCHAR(255) NOT NULL,
video_url VARCHAR(255) NOT NULL,
author VARCHAR(50) NOT NULL,
views INT UNSIGNED NOT NULL,
likes INT UNSIGNED NOT NULL,
dislikes INT UNSIGNED NOT NULL
);


CREATE TABLE IF NOT EXISTS comments(
id INT UNSIGNED AUTO_INCREMENT KEY,
product_id INT UNSIGNED NOT NULL REFERENCES productions(product_id),
username VARCHAR(40) NOT NULL,
content VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS operations(
oper_id INT UNSIGNED AUTO_INCREMENT KEY,
username VARCHAR(40) NOT NULL,
type_id INT UNSIGNED NOT NULL
);

CREATE TABLE IF NOT EXISTS operation_types(
type_id INT UNSIGNED NOT NULL,
description VARCHAR(30) NOT NULL
);