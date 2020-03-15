CREATE TABLE tweets(
Id int AUTO_INCREMENT,
IdUsers int,
Content varchar(255) NOT NULL,
Date datetime DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(Id, IdUsers),
FOREIGN KEY tweets(IdUsers) REFERENCES users(Id)
)ENGINE='InnoDB';