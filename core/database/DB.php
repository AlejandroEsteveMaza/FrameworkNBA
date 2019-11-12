<?php
namespace core\database;
use core\database\PdoConnection as PdoConnection;


class DB
{

    private static $instance;
    private $table;
    private $fields = [];
    private $wheres = [];
    private $operators = [
        '=',
        '<',
        '>',
        '<=',
        '>='
    ];

    // Método para devolver una instancia de DB con la tabla que toca
    public static function table($table)
    {
        $instance = new static;
        $instance->setTable($table);
        return $instance;
    }

    private function setTable($table)
    {
        $this->table = $table;
    }

    private function getTable()
    {
        return $this->table;
    }

    /*
      selecciona los campos de la tabla para el select
      ...$fields para que el número de los argumentos pueda ser variable (0,1,2...)
     */
    public function select(...$fields)
    {
        foreach ($fields as $field) {
            $this->setField($field);
        }
        return $this;
    }

    private function setField($field)
    {
        array_push($this->fields, $this->sanitize($field));
    }

    private function sanitize($value)
    {
        return preg_replace('/[^0-9a-zA-Z_-]/', '', $value);
    }

    public function where($field, $operator, $value)
    {
        $condition = [
            "field" => $this->sanitize($field),
            "operator" => $this->sanitizeOperator($operator),
            "value" => $this->sanitize($value)
        ];
        $this->setWhere($condition);
        return $this;
    }

    private function sanitizeOperator($operator)
    {
        if (in_array($operator, $this->operators))
            return $operator;
        else return '=';
    }

    private function setWhere($condition)
    {
        array_push($this->wheres, $condition);
    }

    public function get()
    {
        $fields = $this->fieldsParaSQL();
        $wheres = $this->wheresParaSQL();

        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table;
        if (!empty($wheres)) {
            $sql .= ' WHERE ' . $wheres["sql"];
        }
        $connection = PdoConnection::getInstance();
        $test = $wheres["params"];
        var_dump($test);
        return $connection->select($sql,$wheres["params"]);
        
    }

    public function insert($record)
    {   
        $columns = "";
        $values = "";
        $params = [];
        foreach ($record as $key => $value) {
            $columns.= $key . ", ";
            $values .= " :".$key . ", ";
            $params[":".$key] = $value;
        }
        $columns = substr($columns,0,-2);
        $values = substr($values,0,-2);
        

        $sql = 'INSERT INTO ' . $this->table . ' (' . $columns . ') VALUES (' . $values . ')';
        $connection = PdoConnection::getInstance();
        return $connection->insert($sql,$params);
    }

    public function lastInsertId()
    {
        $sql = "SELECT codigo FROM $this->table ORDER BY codigo DESC limit 1";
        $connection = PdoConnection::getInstance();
        return $connection->lastInsertId($sql);
    }

    public function delete()
    {
        $wheres = $this->wheresParaSQL();
        $sql = 'DELETE FROM ' . $this->table; 
        if (isset($wheres)) {
            $sql .= ' WHERE ' . $wheres["sql"];
        }
        $connection = PdoConnection::getInstance();
        return $connection->delete($sql,$wheres["params"]);
    }

    public function update($record)
    {
        $wheres = $this->wheresParaSQL();
        $columns = "";
        foreach ($record as $key => $value) {
            $columns.= $key . " = '". $value ."', ";
        }
        $columns = substr($columns,0,-2);
        $sql =  'UPDATE '.$this->table.' SET '. $columns .' WHERE ' .$wheres["sql"];
        
        $connection = PdoConnection::getInstance();
        return $connection->update($sql,$wheres["params"]);
    }

    /**
     * Concatena los campos de la tabla para la sql.
     * @return string
     */
    public function fieldsParaSQL()
    {
        $fields = "";
        if (empty($this->fields)) {
            $fields .= " * ";
        } else {
            for ($i = 0; $i < count($this->fields); $i++) {
                $fields .= $this->fields[$i];
                if ($i != count($this->fields)) {
                    $fields .= ", ";
                }
            }
        }
        
        
        return $fields;
    }

    /**
     * Crea el WHERE para la sentencia preparada, ademas de params.
     * @return array
     */
    public function wheresParaSQL()
    {   
        $wheres = [];
        $sql = "";
        if (!empty( $this->wheres)) {
            $params = [];
            foreach ($this->wheres as $condicion) {
                $sql .= $condicion["field"].$condicion["operator"].":".$condicion["field"]." AND ";
               
                $params[":".$condicion["field"]] = $condicion['value'];
            }
            $sql = substr($sql,0,-5);
            $wheres = ["sql"=>$sql, "params"=>$params];
        }
        return $wheres;
    }
}
