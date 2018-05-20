<?php
/***********************************
Purpose:
Initializes the database with 4 tables:
Skills
Portfolio
Education
Work
*************************************/
    $config = parse_ini_file("configsql.ini");

    // Create connection
    $conn = new mysqli($config['servername'], $config['username'], $config['password']);

    // Check connection
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully<br>";

    $sql = "CREATE DATABASE IF NOT EXISTS " . $config['database'] . ";";
    if ($conn->query($sql) === TRUE) {
        echo $config['database'], "created successfully<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }

    $sql = "USE ". $config['database'] . ";";
    if ($conn->query($sql) === TRUE) {
        echo "a2 linked successfully<br>";
    } else {
        echo "Error linking database: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE IF NOT EXISTS users (
                user_id INT(11) NOT NULL AUTO_INCREMENT,
                user_name VARCHAR(50) NOT NULL,
                user_pass VARCHAR(50) NOT NULL,
                PRIMARY KEY (user_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
    if ($conn->query($sql) === TRUE) {
        echo "Created user table successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE IF NOT EXISTS user.details (
                user_id INT(11) NOT NULL,
                name VARCHAR(50),
                email VARCHAR(50),
                PRIMARY KEY (user_id),
                FOREIGN KEY (user_id)
                    REFERENCES users(user_id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    if ($conn->query($sql) === TRUE) {
        echo "Created user.details table successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE IF NOT EXISTS products (
                sku INT(11) NOT NULL,
                pro_name VARCHAR(50) NOT NULL,
                cost FLOAT(10,2) NOT NULL,
                category VARCHAR(50) NOT NULL,
                stock INT(11) NOT NULL,
                PRIMARY KEY (sku),
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    if ($conn->query($sql) === TRUE) {
        echo "Created products table successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $sql = "IINSERT INTO products(sku, pro_name, cost, category, stock) VALUES (";
    if ($conn->query($sql) === TRUE) {
        echo "Insert products table successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $conn->close();
