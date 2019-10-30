<?php

namespace core\form;

/**
 * Clase para validar los campos de un formulario
 */
class Input {
    
    /**
     * Archivos de imagen permitidos
     */
    static $whiteList = array ('jpg', 'png', 'bmp');


    /**
     * Comprueba si se han pasado los campos correctos del formulario
     *
     * @param array $fields
     * @param boolean $on
     * @return boolean
     */
    static function check($fields, $on = false) {
        
       foreach ($fields as $value) {
          
            if (!isset($fields) ) {
           
            }
       }


/* 
        for ($i=0; $i < count($fields); $i++) { 
            echo $fields[$i] ."---". $on[$i];
            if ($fields[$i] != $on[$i]){

            }
        } */
    }


    /**
     * Devuelve el valor de un string sanitizado
     *
     * @param string $value
     * @return string
     */
    static function str($value) {
        return trim(preg_replace('/[^0-9a-zA-Z_-]/', '', $value));
    }

    /**
     * Comprueba si la extensión de la imagen es valida
     *
     * @param [type] $path
     * @return boolean
     */
    static function checkImage($path) {
    }

}
