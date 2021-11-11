CREATE DATABASE hospital_reserve CHARACTER SET utf8;
GRANT ALL ON hospital_reserve.* TO development@'%' IDENTIFIED BY 'development';

USE hospital_reserve;

CREATE TABLE patients(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(64) NOT NULL UNIQUE, address VARCHAR(128), tel VARCHAR(12));
CREATE TABLE reserves(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, patient_id INT, date_and_time DATETIME);
