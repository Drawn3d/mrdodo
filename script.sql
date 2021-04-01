CREATE DATABASE litterie3000;

use litterie3000;

create table lit(
id smallint primary key auto_increment,
name varchar(50) not null,
marque varchar(50) not null,
prix tinyint not null,
image varchar(500) not null,
promo tinyint(3)
);

create table size(
id tinyint primary key auto_increment,
taille varchar(50)
);

insert into lit
(name, marque, prix, image)
values
("Tamoul", "EPEDA","759.00", "https://www.convertiblecenter.fr/img/cms/Matelas-quotidien-confortable-d-une-densite-de-35kgm3-nouveau-garanti-5-ans.jpg"),
("Waldorf", "DREAMWAY", "809.00", "https://www.convertiblecenter.fr/img/cms/Matelas-quotidien-confortable-d-une-densite-de-35kgm3-nouveau-garanti-5-ans.jpg"),
("Joris", "BULTEX", "759.00", "https://www.convertiblecenter.fr/img/cms/Matelas-quotidien-confortable-d-une-densite-de-35kgm3-nouveau-garanti-5-ans.jpg"),
("Melon", "EPEDA", "1019.00", "https://www.convertiblecenter.fr/img/cms/Matelas-quotidien-confortable-d-une-densite-de-35kgm3-nouveau-garanti-5-ans.jpg"),
("RevDoux", "DORSOLINE", "2499.00", "https://www.convertiblecenter.fr/img/cms/Matelas-quotidien-confortable-d-une-densite-de-35kgm3-nouveau-garanti-5-ans.jpg"),
("Aspirine", "MEMORYLINE", "1111.00", "https://www.convertiblecenter.fr/img/cms/Matelas-quotidien-confortable-d-une-densite-de-35kgm3-nouveau-garanti-5-ans.jpg");

insert into size
(taille)
values
("90x190"),
("140x190"),
("160x200"),
("180x200"),
("200x200");

create table lit_size(
	lit_id smallint,
	size_id tinyint,
	primary key(lit_id, size_id),
	foreign key(lit_id) references lit(id),
	foreign key(size_id) references size(id)
);

insert into lit_size 
(lit_id, size_id)
values
(1,1),
(2,1),
(3,2),
(4,3),
(5,5),
(6,4);