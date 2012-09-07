-- Chooti Malli SQL Queries
-- Source the SQL in this Manner

CREATE DATABASE chootimalli;

CREATE TABLE log
(
tuple int NOT NULL AUTO_INCREMENT,
tp varchar(50),
msg varchar(160),
PRIMARY KEY (tuple)
);

CREATE TABLE pendingBox
(
id int NOT NULL AUTO_INCREMENT,
tp varchar(160),
ques varchar(160),
PRIMARY KEY (id)
);

CREATE TABLE 
(
id int NOT NULL AUTO_INCREMENT,
tp varchar(160),
ans varchar(160),
PRIMARY KEY (id)
);


insert into log (tp, msg) values ("0712217666","Hello");

insert into pendingBox (tp, ques) values ("0712217666","mokada?");

insert into sentBox (tp, ans) values ("0712217666","hondai..");

Test SVN