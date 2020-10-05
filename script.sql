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
headimg_url VARCHAR(255) DEFAULT "img/headimg/0.png",
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


insert into accounts (username, password, is_admin, email, phone, school, headimg_url, create_date)
values
('test_username', 'e10adc3949ba59abbe56e057f20f883e', 0, 'test_username@gmail.com', '+65 432435443', 'National University of Singapore', 
	'img/headimg/2.png' , STR_TO_DATE('30,5,2020','%d,%m,%Y')),
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'admin123456@gmail.com', '+65 847294575', 'James Cook University Singapore', 
	'img/headimg/3.png' , STR_TO_DATE('7,5,2020','%d,%m,%Y')),

('Edward', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Edward233@gmail.com', '+65 346597463', 'National University of Singapore', 
	'img/headimg/5.png' , STR_TO_DATE('16,5,2020','%d,%m,%Y')),
('Caitlin', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Caitlin3746@gmail.com', '+65 832476387', 'National University of Singapore', 
	'img/headimg/7.png' , STR_TO_DATE('30,5,2020','%d,%m,%Y')),
('Anne', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Anne2000@gmail.com', '+65 123912033', 'James Cook University Singapore', 
	'img/headimg/9.png' , STR_TO_DATE('13,6,2020','%d,%m,%Y')),
('Tony', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Tony2010@gmail.com', '+65 109826374', 'National University of Singapore', 
	'img/headimg/2.png' , STR_TO_DATE('21,6,2020','%d,%m,%Y')),
('Wade', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Wade4376@gmail.com', '+65 342379816', 'Singapore Management University', 
	'img/headimg/4.png' , STR_TO_DATE('27,6,2020','%d,%m,%Y')),
('Dahila', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Dahila0507@gmail.com', '+65 189237632', 'NUS Business School', 
	'img/headimg/6.png' , STR_TO_DATE('2,7,2020','%d,%m,%Y')),
('Abagael', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Abagael0808@gmail.com', '+65 198237463', 'Nanyang Technological University', 
	'img/headimg/8.png' , STR_TO_DATE('6,7,2020','%d,%m,%Y')),
('Nicholas', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Nicholas123456@gmail.com', '+65 792356497', 'Nanyang Technological University', 
	'img/headimg/1.png' , STR_TO_DATE('12,7,2020','%d,%m,%Y')),
('Zabulon', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Zabulon778899@gmail.com', '+65 923867473', 'Singapore Management University', 
	'img/headimg/3.png' , STR_TO_DATE('26,7,2020','%d,%m,%Y')),
('Gabriel', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Gabriel0304@gmail.com', '+65 934278634', 'National University of Singapore', 
	'img/headimg/5.png' , STR_TO_DATE('1,8,2020','%d,%m,%Y')),
('Hadley', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Hadley1314@gmail.com', '+65 873426364', 'Singapore Management University', 
	'img/headimg/7.png' , STR_TO_DATE('14,8,2020','%d,%m,%Y')),
('Sam', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Sam2005@gmail.com', '+65 263478562', 'NUS Business School', 
	'img/headimg/9.png' , STR_TO_DATE('25,8,2020','%d,%m,%Y')),
('Jack', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Jack2015@gmail.com', '+65 476573826', 'James Cook University Singapore', 
	'img/headimg/2.png' , STR_TO_DATE('3,9,2020','%d,%m,%Y')),
('Connor', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Connor666666@gmail.com', '+65 237862765', 'National University of Singapore', 
	'img/headimg/4.png' , STR_TO_DATE('12,9,2020','%d,%m,%Y')),
('Morris', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Morris0922@gmail.com', '+65 813726236', 'Nanyang Technological University', 
	'img/headimg/6.png' , STR_TO_DATE('22,9,2020','%d,%m,%Y')),
('Frank', 'e10adc3949ba59abbe56e057f20f883e', 0, 'test_username@gmail.com', '+65 724367823', 'Nanyang Technological University', 
	'img/headimg/8.png' , STR_TO_DATE('24,9,2020','%d,%m,%Y')),
('Alice', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Frank0827@gmail.com', '+65 362937826', 'Singapore Management University', 
	'img/headimg/1.png' , STR_TO_DATE('25,9,2020','%d,%m,%Y')),
('Tom', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Tom456789@gmail.com', '+65 478763755', 'NUS Business School', 
	'img/headimg/3.png' , STR_TO_DATE('26,9,2020','%d,%m,%Y')),
('Nahaliel', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Nahaliel623453@gmail.com', '+65 364525574', 'National University of Singapore', 
	'img/headimg/5.png' , STR_TO_DATE('1,10,2020','%d,%m,%Y'));


insert into productions (username, author, category, title, description, pic_url, video_url, create_date, likes)
values
('Tony',  'ChilledCow', 'Video', 'lofi hip hop radio', 'lofi hip hop radio - beats to relax/study to
',  'https://resources.matcha-jp.com/resize/720x2000/2020/04/23-101958.jpeg', 'https://www.youtube.com/embed/pvPsJFRGleA' , STR_TO_DATE('30,5,2020','%d,%m,%Y'), 123),

('Anne', 'WLOP', 'Video', 'Photoshop painting', 
	'If you want to get the high res wallpaper images and full painting process video, come to my patreon: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/X9IkwoMrO9w/maxresdefault.jpg', 'https://www.youtube.com/embed/X9IkwoMrO9w&t=93s', STR_TO_DATE('7,5,2020','%d,%m,%Y'), 132),


('Caitlin', 'WLOP', 'Video', 'Live wallpaper', 
	'This is a scene I painted about 5 years ago, I use it for my own desktop wallpaper for a long time.', 
	'https://img.youtube.com/vi/9AQLc3gYzaE/maxresdefault.jpg', 'https://www.youtube.com/embed/9AQLc3gYzaE', STR_TO_DATE('16,5,2020','%d,%m,%Y'), 654),

('Nahaliel', 'WLOP', 'Video', 'Live Wallpaper', 
	'I am always interested in making ani, and this is the fourth one I made.', 
	'https://img.youtube.com/vi/JrSZnRvkC04/maxresdefault.jpg', 'https://www.youtube.com/embed/JrSZnRvkC04', STR_TO_DATE('30,5,2020','%d,%m,%Y'), 5),

('Sally', 'WLOP', 'Video', 'Photoshop 3D painting', 
	'Try some new stuff in Photoshop. Its done in Photoshop cc 2018 with the 3d tool.', 
	'https://img.youtube.com/vi/ZydZ72iUKDQ/maxresdefault.jpg', 'https://www.youtube.com/embed/ZydZ72iUKDQ&t=33s', STR_TO_DATE('13,6,2020','%d,%m,%Y'), 13),

('Tony', 'WLOP', 'Video', 'Photoshop painting process', 
	'Wallpaper, PSD file and normal speed painting process of this image will release on Patreon.', 
	'https://img.youtube.com/vi/NNBfxHfoaxs/maxresdefault.jpg', 'https://www.youtube.com/embed/NNBfxHfoaxs&t=3s', STR_TO_DATE('21,6,2020','%d,%m,%Y'), 66),

('Abagael', 'WLOP', 'Video', 'Portrait Demo (Aeolian)', 
	'The full normal speed process video will send to my supporters on Patreon: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/NNBfxHfoaxs/maxresdefault.jpg', 'https://www.youtube.com/embed/vu9wn-dZOqI&t=7s', STR_TO_DATE('27,6,2020','%d,%m,%Y'), 2314),

('Dahila', 'WLOP', 'Video', 'Ash - painting process', 
	'Ashen one, hearest thou my voice still?', 'https://img.youtube.com/vi/ESz_809S2rs/maxresdefault.jpg', 
	'https://www.youtube.com/embed/ESz_809S2rs', STR_TO_DATE('2,7,2020','%d,%m,%Y'), 2314),

('Wade', 'WLOP', 'Video', 'Modeling & Painting', 
	'The full normal speed process video will send to my supporters on Patreon: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/RA7Uud9gky4/maxresdefault.jpg', 'https://www.youtube.com/embed/RA7Uud9gky4', STR_TO_DATE('6,7,2020','%d,%m,%Y'), 4325),

('Tony', 'WLOP', 'Video', 'Photoshop painting', 
	'8k wallpaper, PSD file, normal speed process video of this image: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/enMePD-w7j0/maxresdefault.jpg', 'https://www.youtube.com/embed/enMePD-w7j0&t=96s', STR_TO_DATE('12,7,2020','%d,%m,%Y'), 336),


('Nicholas', 'WLOP', 'Video', 'Photoshop painting', 
	'Wallpaper, PSD file and normal speed painting process of this image will release on Patreon.', 
	'https://img.youtube.com/vi/ZuxW4AMBjNo/maxresdefault.jpg', 'https://www.youtube.com/embed/ZuxW4AMBjNo&t=102s', STR_TO_DATE('26,7,2020','%d,%m,%Y'), 84),

('Zabulon', 'HawkGuruHacker', 'Video', '6 SIMPLE INVENTIONS', 
	'Hello my friends in this DIY we will see how to make this 6 simple inventions or homemade life hacks at home.', 
	'https://img.youtube.com/vi/NHgXDqU-ihM/maxresdefault.jpg', 'https://www.youtube.com/embed/NHgXDqU-ihM', STR_TO_DATE('1,8,2020','%d,%m,%Y'), 22),

('Gabriel', 'HawkGuruHacker', 'Video', '8 SIMPLE INVENTIONS', 
	'Hello there, in today’s tutorial of DIY, you will see how to make 8 simple inventions or amazing life hacks.', 
	'https://img.youtube.com/vi/hqeHkhljEOE/maxresdefault.jpg', 'https://www.youtube.com/embed/hqeHkhljEOE', STR_TO_DATE('14,8,2020','%d,%m,%Y'), 87),

('Hadley', 'HawkGuruHacker', 'Video', '4 SIMPLE INVENTIONS', 'In this video I show you how to make 4 simple inventions using recycled materials.', 
	'https://img.youtube.com/vi/hqeHkhljEOE/maxresdefault.jpg', 'https://www.youtube.com/embed/wHr5K0299BQ', STR_TO_DATE('25,8,2019','%d,%m,%Y'), 47),

('Sam', 'HawkGuruHacker', 'Video', '5 SIMPLE INVENTIONS', 
	'Simple inventions using recycled materials. 5 Simple inventions to make at home.', 
	'https://img.youtube.com/vi/pTyvgvlAvmQ/maxresdefault.jpg', 'https://www.youtube.com/embed/pTyvgvlAvmQ', STR_TO_DATE('3,9,2020','%d,%m,%Y'), 854),

('Jack', 'HawkGuruHacker', 'Video', '8 SIMPLE INVENTIONS', 
	'in today’s tutorial of DIY lets see how to make this 8 simple inventions using recycled materials, these are awesome life hacks for summer.', 
	'https://img.youtube.com/vi/rg0EhdhdEkA/maxresdefault.jpg', 'https://www.youtube.com/embed/rg0EhdhdEkA', STR_TO_DATE('12,9,2020','%d,%m,%Y'), 266),

('Connor', 'STIMULUS', 'Video', 'Motion Capture Animation', 
	' Its a cartoon that uses motion capture to warp puppet mesh pins in After Effects.', 
	'https://img.youtube.com/vi/H6NaNydNAEc/maxresdefault.jpg', 'https://www.youtube.com/embed/H6NaNydNAEc', STR_TO_DATE('22,9,2020','%d,%m,%Y'), 84),

('Morris', 'Olof Storm', 'Video', '2D Action Animation', 
	'I got inspired by @briandemonwolf on instagram and used some of his movements as reference for the jump kick.', 
	'https://img.youtube.com/vi/CiXFzjnxor0/maxresdefault.jpg', 'https://www.youtube.com/embed/CiXFzjnxor0', STR_TO_DATE('24,9,2020','%d,%m,%Y'), 15),

('Frank', 'Captain Gizmo', 'Video', 'Top Technology Inventions', 
	'description', 'https://img.youtube.com/vi/CiXFzjnxor0/maxresdefault.jpg', 
	'https://www.youtube.com/embed/iHlsV-w61T4', STR_TO_DATE('25,1,2020','%d,%m,%Y'), 987),

('Alice', 'HawkGuruHacker', 'Video', 'Awesome New Invention', 
	'In this awesome DIY tutorial lets know how to make this Tesla Electric Lighter or new life hacks with home things you can find in your house.', 
	'https://img.youtube.com/vi/hqeHkhljEOE/maxresdefault.jpg', 'https://www.youtube.com/embed/gmvYfPC2Amw', STR_TO_DATE('26,9,2020','%d,%m,%Y'), 876),

('Tom', 'Rongzhong Li', 'Video', 'Petoi Bittle available', 
	'Two years after the launch of Nybble, we are proud to announce Bittle, a palm-sized robot dog for STEM and fun! ', 
	'https://img.youtube.com/vi/MEhJzbhxm8A/maxresdefault.jpg', 'https://www.youtube.com/embed/MEhJzbhxm8A', STR_TO_DATE('1,10,2020','%d,%m,%Y'), 133)
