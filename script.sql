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


insert into accounts (username, password, is_admin, email, phone, school, headimg_url, create_date)
values
('kelvin', 'e10adc3949ba59abbe56e057f20f883e', 0, 'kelvin999@gmail.com', '+65 77889933', 'National University of Singapore', 
	'/img/headimg/0.png' ,STR_TO_DATE('30,9,2020','%d,%m,%Y')),
('test_username', 'e10adc3949ba59abbe56e057f20f883e', 0, 'test_username@gmail.com', '+65 432435443', 'National University of Singapore', 
	'/img/headimg/2.png' , STR_TO_DATE('30,5,2020','%d,%m,%Y'))



insert into productions (username, author, category, title, description, pic_url, video_url, create_date)
values
('kelvin',  'ChilledCow', 'Video', 'lofi hip hop radio', 'lofi hip hop radio - beats to relax/study to
',  'https://resources.matcha-jp.com/resize/720x2000/2020/04/23-101958.jpeg', 'https://www.youtube.com/embed/pvPsJFRGleA' , STR_TO_DATE('30,5,2020','%d,%m,%Y')),

('Anne', 'WLOP', 'Video', 'Photoshop painting', 
	'If you want to get the high res wallpaper images and full painting process video, come to my patreon: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/X9IkwoMrO9w/maxresdefault.jpg', 'https://www.youtube.com/watch?v=X9IkwoMrO9w&t=93s', STR_TO_DATE('7,5,2020','%d,%m,%Y')),


('Caitlin', 'WLOP', 'Video', 'Live wallpaper', 
	'This is a scene I painted about 5 years ago, I use it for my own desktop wallpaper for a long time.', 
	'https://img.youtube.com/vi/9AQLc3gYzaE/maxresdefault.jpg', 'https://www.youtube.com/watch?v=9AQLc3gYzaE', STR_TO_DATE('16,5,2020','%d,%m,%Y')),

('Nahaliel', 'WLOP', 'Video', 'Live Wallpaper', 
	'I am always interested in making ani, and this is the fourth one I made.', 
	'https://img.youtube.com/vi/JrSZnRvkC04/maxresdefault.jpg', 'https://www.youtube.com/watch?v=JrSZnRvkC04', STR_TO_DATE('30,5,2020','%d,%m,%Y')),

('Sally', 'WLOP', 'Video', 'Photoshop 3D painting', 
	'Try some new stuff in Photoshop. Its done in Photoshop cc 2018 with the 3d tool.', 
	'https://img.youtube.com/vi/ZydZ72iUKDQ/maxresdefault.jpg', 'https://www.youtube.com/watch?v=ZydZ72iUKDQ&t=33s', STR_TO_DATE('13,6,2020','%d,%m,%Y')),

('Edward', 'WLOP', 'Video', 'Photoshop painting process', 
	'Wallpaper, PSD file and normal speed painting process of this image will release on Patreon.', 
	'https://img.youtube.com/vi/NNBfxHfoaxs/maxresdefault.jpg', 'https://www.youtube.com/watch?v=NNBfxHfoaxs&t=3s', STR_TO_DATE('21,6,2020','%d,%m,%Y')),

('Abagael', 'WLOP', 'Video', 'Portrait Demo (Aeolian)', 
	'The full normal speed process video will send to my supporters on Patreon: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/vu9wn-dZOqI/hqdefault.jpg', 'https://www.youtube.com/watch?v=vu9wn-dZOqI&t=7s', STR_TO_DATE('27,6,2020','%d,%m,%Y')),

('Dahila', 'WLOP', 'Video', 'Ash - painting process', 
	'Ashen one, hearest thou my voice still?', 'https://img.youtube.com/vi/ESz_809S2rs/maxresdefault.jpg', 
	'https://www.youtube.com/watch?v=ESz_809S2rs', STR_TO_DATE('2,7,2020','%d,%m,%Y')),

('Wade', 'WLOP', 'Video', 'Modeling & Painting', 
	'The full normal speed process video will send to my supporters on Patreon: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/RA7Uud9gky4/maxresdefault.jpg', 'https://www.youtube.com/watch?v=RA7Uud9gky4', STR_TO_DATE('6,7,2020','%d,%m,%Y')),

('Tony', 'WLOP', 'Video', 'Photoshop painting', 
	'8k wallpaper, PSD file, normal speed process video of this image: https://www.patreon.com/wlop.', 
	'https://img.youtube.com/vi/enMePD-w7j0/maxresdefault.jpg', 'https://www.youtube.com/watch?v=enMePD-w7j0&t=96s', STR_TO_DATE('12,7,2020','%d,%m,%Y')),


('Nicholas', 'WLOP', 'Video', 'Photoshop painting', 
	'Wallpaper, PSD file and normal speed painting process of this image will release on Patreon.', 
	'https://img.youtube.com/vi/ZuxW4AMBjNo/maxresdefault.jpg', 'https://www.youtube.com/watch?v=ZuxW4AMBjNo&t=102s', STR_TO_DATE('26,7,2020','%d,%m,%Y')),

('Zabulon', 'HawkGuruHacker', 'Video', '6 SIMPLE INVENTIONS', 
	'Hello my friends in this DIY we will see how to make this 6 simple inventions or homemade life hacks at home.', 
	'https://img.youtube.com/vi/NHgXDqU-ihM/maxresdefault.jpg', 'https://www.youtube.com/watch?v=NHgXDqU-ihM', STR_TO_DATE('1,8,2020','%d,%m,%Y')),

('Gabriel', 'HawkGuruHacker', 'Video', '8 SIMPLE INVENTIONS', 
	'Hello there, in today’s tutorial of DIY, you will see how to make 8 simple inventions or amazing life hacks.', 
	'https://img.youtube.com/vi/hqeHkhljEOE/maxresdefault.jpg', 'https://www.youtube.com/watch?v=hqeHkhljEOE', STR_TO_DATE('14,8,2020','%d,%m,%Y')),

('Hadley', 'HawkGuruHacker', 'Video', '4 SIMPLE INVENTIONS', 'In this video I show you how to make 4 simple inventions using recycled materials.', 
	'https://img.youtube.com/vi/wHr5K0299BQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=wHr5K0299BQ', STR_TO_DATE('25,8,2020','%d,%m,%Y')),

('Sam', 'HawkGuruHacker', 'Video', '5 SIMPLE INVENTIONS', 
	'Simple inventions using recycled materials. 5 Simple inventions to make at home.', 
	'https://img.youtube.com/vi/pTyvgvlAvmQ/maxresdefault.jpg', 'https://www.youtube.com/watch?v=pTyvgvlAvmQ', STR_TO_DATE('3,9,2020','%d,%m,%Y')),

('Jack', 'HawkGuruHacker', 'Video', '8 SIMPLE INVENTIONS', 
	'in today’s tutorial of DIY lets see how to make this 8 simple inventions using recycled materials, these are awesome life hacks for summer.', 
	'https://img.youtube.com/vi/rg0EhdhdEkA/maxresdefault.jpg', 'https://www.youtube.com/watch?v=rg0EhdhdEkA', STR_TO_DATE('12,9,2020','%d,%m,%Y')),

('Connor', 'STIMULUS', 'Video', 'Motion Capture Animation', 
	' Its a cartoon that uses motion capture to warp puppet mesh pins in After Effects.', 
	'https://img.youtube.com/vi/H6NaNydNAEc/maxresdefault.jpg', 'https://www.youtube.com/watch?v=H6NaNydNAEc', STR_TO_DATE('22,9,2020','%d,%m,%Y')),

('Morris', 'Olof Storm', 'Video', '2D Action Animation', 
	'I got inspired by @briandemonwolf on instagram and used some of his movements as reference for the jump kick.', 
	'https://img.youtube.com/vi/CiXFzjnxor0/maxresdefault.jpg', 'https://www.youtube.com/watch?v=CiXFzjnxor0', STR_TO_DATE('24,9,2020','%d,%m,%Y')),

('Frank', 'Captain Gizmo', 'Video', 'Top Technology Inventions', 
	'description', 'https://img.youtube.com/vi/iHlsV-w61T4/sddefault.jpg', 
	'https://www.youtube.com/watch?v=iHlsV-w61T4', STR_TO_DATE('25,9,2020','%d,%m,%Y')),

('Alice', 'HawkGuruHacker', 'Video', 'Awesome New Invention', 
	'In this awesome DIY tutorial lets know how to make this Tesla Electric Lighter or new life hacks with home things you can find in your house.', 
	'https://img.youtube.com/vi/iHlsV-w61T4/sddefault.jpg', 'https://www.youtube.com/watch?v=gmvYfPC2Amw', STR_TO_DATE('26,9,2020','%d,%m,%Y')),

('Tom', 'Rongzhong Li', 'Video', 'Petoi Bittle available', 
	'Two years after the launch of Nybble, we are proud to announce Bittle, a palm-sized robot dog for STEM and fun! ', 
	'https://img.youtube.com/vi/MEhJzbhxm8A/maxresdefault.jpg', 'https://www.youtube.com/watch?v=MEhJzbhxm8A', STR_TO_DATE('1,10,2020','%d,%m,%Y'))




