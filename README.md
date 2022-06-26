# ABOUT
This web application serves to demonstrate the use of MariaDB



# CODEBOOTCAMP SQL QUERIES

Creating the database: 
    CREATE DATABASE codebootcamp_db;

Creating tables:

    CREATE TABLE tbl_users (
        id int(11) not null AUTO_INCREMENT PRIMARY KEY,
        first_name varchar(30) not null,
        last_name varchar(30) not null,
        email varchar(30) not null,
        address varchar(30) not null,
        username varchar(30) not null,
        password varchar(250) not null
    );

    CREATE TABLE tbl_service (
        id int(11) not null AUTO_INCREMENT PRIMARY KEY,
        title varchar(70) not null,
        content longtext not null,
        image_path longtext not null 
    );

Inserting data:
    INSERT INTO tbl_service (title, content, image_path) 
    VALUES ('Kotlin', 'Learn Kotlin to become a android mobile developer<br><br>Cost: $20.00', '../images/kotlin.png');

    INSERT INTO tbl_service (title, content, image_path) 
    VALUES ('JS', 'Learn Javascript to make webpages look dynamic<br><br>Cost: $80.00', '../images/javascript.png');

    INSERT INTO tbl_service (title, content, image_path) 
    VALUES ('Python', 'Learn Python to build backend for websites<br><br>Cost: $12.00', '../images/python.png');

    
