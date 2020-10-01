DROP DATABASE IF EXISTS `students_funding_system`;
CREATE DATABASE IF NOT EXISTS `students_funding_system` DEFAULT CHARACTER SET 'UTF8';
USE `students_funding_system`;

DROP table IF EXISTS accounts;
DROP table IF EXISTS productions;
DROP table IF EXISTS comments;
DROP table IF EXISTS operations;
DROP table IF EXISTS  operation_types;

CREATE TABLE IF NOT EXISTS accounts(
id INT UNSIGNED AUTO_INCREMENT KEY,
username VARCHAR(40) NOT NULL,
password VARCHAR(100) NOT NULL,
is_admin INT UNSIGNED DEFAULT 0,
email VARCHAR(40) DEFAULT NULL,
phone VARCHAR(40) DEFAULT NULL,
school VARCHAR(40) DEFAULT NULL,
description VARCHAR(1000) DEFAULT 'Do not have a description yet',
headimg_url VARCHAR(255) DEFAULT "/img/headimg/0.png",
create_date DATETIME DEFAULT CURRENT_TIMESTAMP()
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
views INT UNSIGNED DEFAULT 0,
likes INT UNSIGNED DEFAULT 0,
dislikes INT UNSIGNED DEFAULT 0,
create_date DATETIME DEFAULT CURRENT_TIMESTAMP()
);


CREATE TABLE IF NOT EXISTS comments(
id INT UNSIGNED AUTO_INCREMENT KEY,
product_id INT UNSIGNED NOT NULL REFERENCES productions(product_id),
username VARCHAR(40) NOT NULL,
content VARCHAR(255) NOT NULL,
create_date DATETIME DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE IF NOT EXISTS operations(
oper_id INT UNSIGNED AUTO_INCREMENT KEY,
username VARCHAR(40) NOT NULL,
type_id INT UNSIGNED NOT NULL,
create_date DATETIME DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE IF NOT EXISTS operation_types(
type_id INT UNSIGNED NOT NULL,
description VARCHAR(30) NOT NULL
);


insert into accounts (username, password, is_admin, email, phone, create_date)
values
('kelvin', 'e10adc3949ba59abbe56e057f20f883e', 0, 'kelvin@gmail.com', '+65 77889933', STR_TO_DATE('30,9,2020','%d,%m,%Y')),
('test_username', 'e10adc3949ba59abbe56e057f20f883e', 0, 'test_username@gmail.com', '+65 432435443', STR_TO_DATE('30,5,2020','%d,%m,%Y'))



insert into productions (username, author, category, title, description, pic_url, video_url, create_date)
values
('kelvin',  'ChilledCow', 'Video', 'lofi hip hop radio', 'lofi hip hop radio - beats to relax/study to
',  'https://resources.matcha-jp.com/resize/720x2000/2020/04/23-101958.jpeg', 'https://www.youtube.com/embed/pvPsJFRGleA' , STR_TO_DATE('30,5,2020','%d,%m,%Y')),

('kelvin',  'ChilledCow', 'Video', 'lofi hip hop radio', 'lofi hip hop radio - beats to relax/study to
',  'https://resources.matcha-jp.com/resize/720x2000/2020/04/23-101958.jpeg', 'https://www.youtube.com/embed/pvPsJFRGleA' , STR_TO_DATE('30,5,2020','%d,%m,%Y')),

('Anne', 'WLOP', 'Video', 'Photoshop painting process - Jewel', 
'If you want to get the high res wallpaper images and full painting process video, come to my patreon: https://www.patreon.com/wlop.', 
'https://img.youtube.com/vi/X9IkwoMrO9w/maxresdefault.jpg', 'https://www.youtube.com/watch?v=X9IkwoMrO9w&t=93s', STR_TO_DATE('7,5,2020','%d,%m,%Y'))
