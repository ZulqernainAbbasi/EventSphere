<?php
<<<<<<< HEAD

class Database
{
    public $connection;

    public function __construct()
    {
        /*
         * Railway MySQL credentials
         *
         * These should be stored as environment variables,
         * not directly inside your PHP code.
         */

        $host = getenv('MYSQLHOST');
        $port = getenv('MYSQLPORT') ?: 3306;
        $username = getenv('MYSQLUSER');
        $password = getenv('MYSQLPASSWORD');
        $database = getenv('MYSQLDATABASE');

        // Check required configuration
        if (!$host || !$username || !$database || !$password) {
            die("Database configuration is missing.");
        }

        // Create MySQL connection
        $this->connection = new mysqli(
            $host,
            $username,
            $password,
            $database,
            (int)$port
        );

        // Check connection
        if ($this->connection->connect_error) {
            die("Database connection failed: " .
                $this->connection->connect_error);
        }

        // Set UTF-8
        $this->connection->set_charset("utf8mb4");
=======
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
>>>>>>> d6fafa3bcfe82ffad38ee697759037447cf66f45
    }
}
?>