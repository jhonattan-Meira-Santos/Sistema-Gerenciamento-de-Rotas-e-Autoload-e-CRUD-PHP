<?php

namespace bolao\class\SQLInjectionProtection;

class SQLInjectionProtection 
{
    // Função para proteger uma string contra SQL injection
    public static function protect($string) {
        // Remove caracteres especiais
        $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
        // Remove espaços em branco do início e do fim
        $string = trim($string);
        // Escapa caracteres especiais
        $string = addslashes($string);
        return $string;
    }

    // Função para proteger um array contra SQL injection
    public static function protectArray($array) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = self::protectArray($value);
            } else {
                $array[$key] = self::protect($value);
            }
        }
        return $array;
    }

}