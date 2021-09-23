CREATE DATABASE php9pm;

CREATE TABLE users(
                      id int AUTO_INCREMENT PRIMARY KEY,
                      name varchar(100),
                      username varchar(100) UNIQUE,
                      email varchar(100) UNIQUE,
                      password varchar(100),
                      gender SET('male','female','others')
);
