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
     * @param array $on
     * @return boolean
     */
    static function check($fields, $on = false)
    {
        /* echo "<pre>";
        var_dump($on);
        var_dump($fields); */
        //$containsAllValues = array_diff($fields, $on);
        /*  foreach ($on as $value) {
            if (in_array($value, $fields)) {
                echo "1";
            }else{
               return false;
            }
        } */
        for ($i = 0; $i < count($on) - 1; $i++) {
            if (!in_array($on[$i], $fields)) { //anyadir or fields no sea mas de 3 cuando anayada el login ?¿
                return false;
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
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
        if (in_array($extension, self::$whiteList)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Devuelve el avatar en formato "avatar" + idUsuario + .extension
     *
     * @param string $path
     * @param string $idUser
     * @return string
     */
    static function renameImage($path, $idUser)
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        return "avatar".$idUser.".".$extension;
    }
}
