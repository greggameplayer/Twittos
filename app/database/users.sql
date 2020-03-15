CREATE TABLE tweets(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Content varchar(255) NOT NULL,
    Pseudo varchar(255) NOT NULL,
    FirstName varchar(255) NOT NULL,
    LastName varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Password varchar(255) NOT NULL
)ENGINE='InnoDB';