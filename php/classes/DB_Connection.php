<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//dotenv = Dotenv\Dotenv::createImmutable("./");
//dotenv->load();

/**
 * @method void Query() Query(string $query, array $params)
 * @method array fetchQuery(string $query, array $params)
 * @method array fetchAllQuery(string $query, array $params)
 */
class db_connection {
    public $conn = null;
    public function __construct() { 
      
        $host = "localhost";
        $username = "root";
        $password = "";
        $database_name = "stemwijzer";
        //$host = "localhost";
        //$username = "student4a8_521282";
        //$password = "t4qPxf";
        //$database_name = "student4a8_521282";
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$database_name",$username,$password);
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
    }

    function Query($query, $params = array()) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    function fetchQuery($query, $params = array()) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function fetchAllQuery($query, $params = array()) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return int
     */
    function getLastId() {
        return (int) $this->conn->lastInsertId();
    }
}