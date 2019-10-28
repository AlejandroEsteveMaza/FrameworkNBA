<?php
namespace core\database;
class PdoConnection
{

    //Instancia de la clase
    private static $instance = null;
    //Conexion con la bbdd
    public $bbdd;


    private function __construct()
    {
        global $config;
        $host = $config["DB"]["HOST"];
        $dbname = $config["DB"]["name"];
        $user = $config["DB"]["USERNAME"];
        $passwd = $config["DB"]["PASSWORD"];
        $CONNECTION = $config["DB"]["CONNECTION"];
        try {
            $this->bbdd = new \PDO("$CONNECTION:host=$host;dbname=$dbname", $user, $passwd);
        } catch (PDOException $e) {
            echo ("¡Error!: " . $e->getMessage() . "<br/>");
            exit();
        }
    }

    public static function getInstance()
    {
        if (!isset($instance)) {
            $instance = new PdoConnection;
        }
        return $instance;
    }


    public function select($query, $params = null)
    {
        return $this->execQuery($query, $params);
    }

    public function insert($query, $params = null)
    {
        return $this->execQueryNoResult($query, $params);
    }

    public function lastInsertId()
    {
        return  $this->bbdd->lastInsertId();
    }

    public function update($query, $params = null)
    {
        return $this->execQueryNoResult($query, $params);
    }


    public function delete($query, $params = null)
    {
        return $this->execQueryNoResult($query, $params);
    }

    private function execQuery($query, $params) 
    {
        $sth = $this->bbdd->prepare($query);
        $sth ->execute($params);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function execQueryNoResult($query, $params)
    {
        $sth = $this->bbdd->prepare($query);
        $sth ->execute($params);
        $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
};
