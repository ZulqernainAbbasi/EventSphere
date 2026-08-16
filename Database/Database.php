<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $databaseName = 'eventsphere';
    public $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->databaseName);
        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
?>