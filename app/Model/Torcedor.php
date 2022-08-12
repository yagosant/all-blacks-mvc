<?php

namespace App\Model;

use App\DB\Conexao;
use App\Utils\Str;
use PDOException;

require './app/db/database.php';

class Torcedor{

    private static $conexao;

    function __construct()
    {
        self::$conexao = Conexao::conexao();
    }


    public function insertTorcedor($torcedor){
        try {
        $sql = 'INSERT INTO torcedores (DOCUMENTO, NOME, TELEFONE, EMAIL, CEP, ENDERECO, BAIRRO, CIDADE, UF, ATIVO) 
        VALUES(:DOCUMENTO, :NOME, :TELEFONE, :EMAIL, :CEP, :ENDERECO, :BAIRRO, :CIDADE, :UF, :ATIVO)';

        $rQuery = self::$conexao->prepare($sql);
        $rQuery->bindValue(':DOCUMENTO', Str::removeMascaras($torcedor['documento']));
        $rQuery->bindValue(':NOME', $torcedor['nome']);
        $rQuery->bindValue(':TELEFONE', $torcedor['telefone']);
        $rQuery->bindValue(':EMAIL', $torcedor['email']);
        $rQuery->bindValue(':CEP', $torcedor['cep']);
        $rQuery->bindValue(':ENDERECO', $torcedor['endereco']);
        $rQuery->bindValue(':BAIRRO', $torcedor['bairro']);
        $rQuery->bindValue(':CIDADE', $torcedor['cidade']);
        $rQuery->bindValue(':UF', $torcedor['uf']);
        $rQuery->bindValue(':ATIVO', $torcedor['ativo']);
        $rQuery->execute();

        return true;
    } catch(PDOException $e) {
        return false;
    }
    }

    public function getTorcedor(){
        try {
        $sql = 'SELECT * FROM torcedores';
        $rQuery = self::$conexao->prepare($sql);
        $rQuery->execute();
        return $rQuery->fetchAll(\PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return false;
    }


    }

}