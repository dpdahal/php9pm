CREATE DATABASE php9pm;

CREATE TABLE students(
                         id int AUTO_INCREMENT PRIMARY KEY,
                         name varchar(100),
                         email varchar(100) UNIQUE,
                         address varchar(100),
                         phone varchar(30)
);