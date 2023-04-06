<?php 

namespace bolao\class\Conexao;

use \PDO;
use \PDOException;

class Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao;
    }

    final public function conectar(){
        /*
        *
        * Jhonattan 11-03-2023
        * O metodo PDO é o mais indicado para conexão por ser o mais seguro.
        * Compatibilidade: PHP 5.2, 5.3, 5.4, 5.5, 5.6, 7.0, etc
        * 
        */

        //Fechar antigas conexão com banco
        unset($this->conexao);

        //Criar nova conexão
        try{
            $this->conexao = new PDO("mysql:host=localhost;dbname=bolao", "root", ""); 
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexao;
        }catch(PDOException $erro){
            echo "ERRO DE CONEXÃO => ". $erro->getMessage();
        }
    }
}