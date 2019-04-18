<?php

/**
 * DB connection Class
 * using PDO
 * prepare statement
 * bind values
 * return results
 */

class Database {
    
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $db_handler;
    private $statement;
    private $error;

    public function __construct()
    {
        // set Data Source Name
        $data_source = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
        $options = array(
            PDO::ATTR_PERSISTENT => true, // persist the db connection
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // error handling
        );

        // create PDO instance
        try {
            $this->db_handler = new PDO(
                $data_source, 
                $this->db_user, 
                $this->db_pass, 
                $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * prepare query statement
     *
     * @param string $sql
     * @return void
     */
    public function prepareQueryStatement($sql)
    {
        $this->statement = $this->db_handler->prepare($sql);
    }

    /**
     * Bind values 
     *
     * @param [type] $param
     * @param [type] $value
     * @param [type] $type
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_INT;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement
     *
     * @return void
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    /**
     * retrieve all records
     *
     * @return array[obj]
     */
    public function getAll()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * retrieve a single record
     *
     * @return obj
     */
    public function getOne()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * return the count of the records
     *
     * @return int
     */
    public function count()
    {
        return $this->statement->rowCount();
    }
}