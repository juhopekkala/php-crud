<?php

/**
 *
 * DBHelper Class
 *
 */

require_once 'config.php';

class DBHelper {

    protected $pdo;

    public function __construct() {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }
    }

    protected function connect() {
        /*$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }*/
    }

    public function disconnect() {
        $this->pdo = null;
    }

    /**
     * @param  $table
     * @param  $conditions
     * @return mixed
     */
    public function select($table, $conditions) {
        try {
            $values = array();
            $where = "";

            foreach($conditions as $k => $v) {
                $where .= " AND " . $k . " LIKE :" . $k;
                $values[":" . $k] = $k;
            }

            $statement = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE 1=1 " . $where);
            $statement->execute($values);

            $response = $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            echo 'Error: Select failed: ' . $e->getMessage();
        }

        return $response;
    }

    public function insert($table, $columns) {
        try {

        } catch(PDOException $e) {

        }
    }

    public function update($table, $columns, $conditions) {
        try {

        } catch(PDOException $e) {

        }
    }

    public function delete($table, $conditions) {
        try {

        } catch(PDOException $e) {

        }
    }
}

?>