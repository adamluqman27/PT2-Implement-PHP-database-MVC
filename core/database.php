<?php

class Database {
    private $connection;

    // Constructor runs automatically when you create a new Database object
    public function __construct() {
        try {
            // Create the PDO connection
            $this->connection = new PDO("mysql:host=lrgs.ftsm.ukm.my;dbname=a203267", "a203267", "largepinksheep");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle connection errors gracefully
            echo "Database connection failed: " . $e->getMessage();
            exit;
        }
    }

    // Method to get the PDO connection
    public function getConnection() {
        return $this->connection;
    }
}

?>