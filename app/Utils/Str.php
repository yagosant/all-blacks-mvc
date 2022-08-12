<?php

namespace App\Utils;

class Str{
    
    static function removeMascaras($string)
{
        $string = str_replace('.', '', $string);
        $string = str_replace('/', '', $string);
        $string = str_replace('-', '', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $string = str_replace('R$', '', $string);
        $string = str_replace(' ', '', $string);

        return $string;
}

static function mascararCpfCnpj($cpfcnpj)
{
        $cpfcnpj = self::removeMascaras($cpfcnpj);
    switch (strlen($cpfcnpj)) {
        case 11:
            return substr($cpfcnpj, 0, 3) . "." . substr($cpfcnpj, 3, 3) . "." . substr($cpfcnpj, 6, 3) . "-" . substr($cpfcnpj, 9);
        case 14:
            return substr($cpfcnpj, 0, 2) . "." . substr($cpfcnpj, 2, 3) . "." . substr($cpfcnpj, 5, 3) . "/" . substr($cpfcnpj, 8, 4) . "-" . substr($cpfcnpj, 12);
    }
        return $cpfcnpj;
}
}