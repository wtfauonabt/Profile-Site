<?php
/***********************************
Connect Database
--------------------------------------
Purpose:
Maintains MySQL database connection and querys
*************************************/

class ConnectDB {

    private $conn;

    private $servername;
    private $username;
    private $password;
    private $database;

    public function __construct()
    {
        if (!file_exists('configsql.ini')) die("File configsql.ini is missing.<br>Terminating.... ");
            $config = parse_ini_file('configsql.ini');

        $this->servername = $config['servername'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];

    }

    public function openConnection()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error())
            throw new ConnectException("Failed to connect database: " . mysqli_connect_error());
    }

    public function closeConnection()
    {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            if (mysql_error())
                throw new ConnectException("Failed to close connection: " . mysql_error());
        }
    }

    public function executeStatement($statement)

    {
        $this->openConnection();

        // Execute database statement
        $result = mysqli_query($this->conn, $statement);
        if (mysqli_error($this->conn))
            throw new Exception("Failed to query statement: " . mysql_error());

        $this->closeConnection();

        return $result;

    }

    public function sanitize($input)
    {
        $this->openConnection();
        $san_input = mysqli_real_escape_string($this->conn, $input);
        $this->closeConnection();
        return $san_input;
    }

}
