<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Initializes the database with 3 tables:
    Users
    Accounts
    Transactions
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

    $sql = "CREATE TABLE IF NOT EXISTS Users (
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

    $sql = "CREATE TABLE IF NOT EXISTS Accounts (
                acc_id INT(11) NOT NULL AUTO_INCREMENT,
                user_id INT(11) NOT NULL,
                acc_bal FLOAT(10,2) NOT NULL,
                PRIMARY KEY (acc_id),
                FOREIGN KEY (user_id)
                    REFERENCES Users(user_id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
    if ($conn->query($sql) === TRUE) {
        echo "Created accounts table successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE IF NOT EXISTS Transactions (
                tran_id INT(11) NOT NULL AUTO_INCREMENT,
                acc_id INT(11) NOT NULL,
                tran_type VARCHAR(1) NOT NULL,
                tran_bal FLOAT(10,2) NOT NULL,
                PRIMARY KEY (tran_id),
                FOREIGN KEY (acc_id)
                    REFERENCES Accounts(acc_id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
    if ($conn->query($sql) === TRUE) {
        echo "Created transactions table successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $conn->close();
