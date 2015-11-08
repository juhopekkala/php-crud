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

    /**
     *
     * The connection remains active for the lifetime of that PDO object. 
     * To close the connection, you need to destroy the object by ensuring that all remaining references to it are deleted.
     * You do this by assigning NULL to the variable that holds the object. 
     * If you don't do this explicitly, PHP will automatically close the connection when your script ends.
     *
     */
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
            $data  = array();
            $where = "";

            foreach($conditions as $k => $v) {
                $where .= " AND " . $k . " LIKE :" . $k;
                $data[":" . $k] = $k;
            }

            $statement = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE 1=1 " . $where);
            $statement->execute($data);

            $response = $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            echo 'Error: Select failed: ' . $e->getMessage();
        }

        return $response;
    }

    public function insert($table, $columnValues) {
        try {
            $data    = array();
            $values  = "";
            $columns = "";

            foreach($columnValues as $k => $v) {
                $columns .= $k . ", ";
                $values  .= ":" . $k . ", ";
                $data[":" . $k] = $v;
            }

            $columns = rtrim($columns, ', ');
            $values  = rtrim($values, ', ');

            $statement = $this->pdo->prepare("INSERT INTO $table($columns) VALUES($values)");
            $statement->execute($data);

            $response = $statement->rowCount();

        } catch(PDOException $e) {
            echo 'Error: Insert failed: ' . $e->getMessage();
        }
    }

    public function update($table, $columns, $conditions) {
        try {

        } catch(PDOException $e) {
            echo 'Error: Update failed: ' . $e->getMessage();
        }
    }

    public function delete($table, $conditions) {
        try {

        } catch(PDOException $e) {
            echo 'Error: Delete failed: ' . $e->getMessage();
        }
    }
}

?>