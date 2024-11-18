<?php
// creates PDO
class Db_conn {
    private $conn;

    public function dbOpen() {
        try {
            $dbHost = 'localhost'; 
            $dbName = 'hmoon3';  // Replace with your database name if different
            $dbUser = 'hmoon3';  // Replace with your username
            $dbPass = 'VVGXZkY8VZEw'; // Replace with your password

            // Set up the connection
            $this->conn = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->conn->setAttribute(PDO::ATTR_AUTOCOMMIT, true);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_LOCAL_INFILE, true);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}

?>