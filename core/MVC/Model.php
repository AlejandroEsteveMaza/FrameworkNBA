<?php

namespace core\MVC;

use core\database\DB as DB;

abstract class Model
{

    protected $table;

    protected $key;

    protected static $instance;

    private $sql;

    protected $exists = false;

    protected $new = true;

    protected $attributes = [];

    protected $originals = [];

    private $wheres = [];


    public function __get($attribute)
    {
        if (array_key_exists($attribute, $this->attributes)) {
            return $this->properties[$attribute];
        }
    }

    public function __set($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    private static function getNewInstance()
    {
        self::$instance = new static;
        return self::$instance;
    }

    public static function getAll()
    {
        $instance = self::getNewInstance();
        $results = DB::table($instance->getTable())->get();
        return $instance->toInstances($results);
    }

    private function toInstances($results, $exits = true)
    {
        $instances = [];
        $i = 0;
        foreach ($results as $row) {
            $instance = $this->getNewInstance();
            $j = 0;
            foreach ($row as $key => $value) {
                $instance->attributes[$key] = $value;
                $instance->originals[$key] = $value;
                $j++;
            }
            $instance->exists = $exits;
            $instance->new = false;
            $instances[$i] = $instance;
            $i++;
        }
        return $instances;
    }

    public static function find($id)
    {
        $instance = self::getNewInstance();
        $results = DB::table($instance->getTable())->where($instance->getKey(), '=', $id)->get();

        return $instance->toInstances($results)[0];
    }

    protected function getTable()
    {
        $table = preg_replace('/[^0-9a-zA-Z_]/', '', $this->table);
        return $table;
    }

    protected function getKey()
    {
        return $this->key;
    }

    private function setWhere($condition)
    {
        array_push($this->wheres, $condition);
    }

    protected function where($field, $operator, $value)
    {
        $condition = [
            "field" => $field,
            "operator" => $operator,
            "value" => $value
        ];
        $this->setWhere($condition);
        return $this;
    }



    public static function __callStatic($method, $arguments)
    {
        return (new static)->$method(...$arguments);
    }

    public function __call($method, $arguments)
    {
        return self::$method(...$arguments);
    }

    public function toSql()
    { }

    protected function get($params = null)
    {
        $instance = self::getNewInstance();

        $results = DB::table($instance->getTable());

        foreach ($this->wheres as $value) {
            $results->where($value['field'], $value['operator'], $value['value']);
        }
        $res[] = $results->get();
        return $res[0];

    }


    public function save()
    {
        if (self::$instance) {
            $instance = self::$instance;
        } else {
            $instance = self::getNewInstance();
        }

        $results = DB::table($instance->getTable());
        
        if ($instance->exists) {
            $results->where($this->key, '=', $this->attributes[$this->key]);
            $results->update($this->attributes);
        } else {
            $results->insert($this->attributes);
        }
        
    }

    public function lastInsertId()
    {
        return DB::table($this->getTable())->lastInsertId();
    }
    
    public function delete()
    {
        $instance = self::$instance;
        $results = DB::table($instance->getTable())->where($this->key, '=', $this->attributes[$this->key]);
        $results->delete();
    }

    /**
     * Devuelve el valor original de la clave primaria
     *
     * @return string
     */
    private function getKeyValue()
    {
        return $this->originals[$this->getKey()];
    }
}
