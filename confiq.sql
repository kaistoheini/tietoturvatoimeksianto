/* POISTETAAN AIEMMAT VERSIOT ENNEN UUSIEN LUOMISTA: */
drop database if exists v0kahe03;

/* LUODAAN TIETOKANTA */
CREATE DATABASE v0kahe03;

USE v0kahe03;

/* LUODAAN TAULU KÄYTTÄJÄTIEDOISTA: */
CREATE TABLE `user` (
    username varchar(40) not null,
    password varchar(40) not null,
    primary key (username)
);

/* LUODAAN TAULU KÄYTTÄJÄN YKSITYISISTÄ TIEDOISTA: */
CREATE TABLE info (
    firstname varchar(40) not null,
    lastname varchar(40) not null,
    username varchar(40) not null, 
    foreign key (username) references user(username)
    on delete restrict
);