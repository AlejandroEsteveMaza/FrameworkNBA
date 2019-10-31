<?php

namespace core\form;

/**
 * Clase para validar los campos de un formulario
 */
class Input
{

    /**
     * Archivos de imagen permitidos
     */
    static $whiteList = array('jpg', 'png', 'bmp');


    /**
     * Comprueba si se han pasado los campos correctos del formulario
     *
     * @param array $fields
     * @param boolean $on
     * @return boolean
     */
    static function check($fields, $on = false)
    {
        echo "<pre>";
        var_dump($fields);
        $containsAllValues = array_diff($fields, $on);

        foreach ($fields as $value) {
            if (in_array($value, $on)) {
                echo "1";
            }else{
               return false;
               break;
            }
        }
        return true;
    }


    /**
     * Devuelve el valor de un string sanitizado
     *
     * @param string $value
     * @return string
     */
    static function str($value)
    {
        return trim(preg_replace('/[^0-9a-zA-Z_-]/', '', $value));
    }

    /**
     * Comprueba si la extensión de la imagen es valida
     *
     * @param [type] $path
     * @return boolean
     */
    static function checkImage($path)
    { }
}
