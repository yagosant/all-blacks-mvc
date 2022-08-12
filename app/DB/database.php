<?php

namespace App\DB;

use PDO;

class Conexao{

    # Variável que guarda a conexão PDO.
    protected static ?PDO $db = null;

    # Private construct - garante que a classe só possa ser instanciada internamente.
    private function __construct()
    {
            self::$db = new PDO(DB_DRIVER . ':host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec('SET NAMES utf8');
    }

    # Método estático - acessível sem instanciação.
    public static function conexao(){
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db){
            new Conexao();
        }


        # Retorna a conexão.
        return self::$db;
    }

    //self::$conn = new PDO("mysql:host=Localhost;dbname=allblacks", 'root', '');
}



