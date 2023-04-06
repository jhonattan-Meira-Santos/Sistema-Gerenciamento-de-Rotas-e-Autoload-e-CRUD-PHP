<?php

namespace bolao\class\Administrador;

use bolao\class\Pessoa\Pessoa;
use bolao\class\Conexao\Conexao;

use \PDOException;
class Administrador extends Pessoa
{
    /** 
    * Função responsavel por criar novo usuário administrador
    * @return bool -> Retorno se foi registrado o usuário
    *
    */
    public function criarNovoAdministrador()
    {
        $conexao = new Conexao();
        
        try
        {
            $dataNascimentoCompleta = $this->getDataNascimentoBR();

            $stmt = $conexao->conectar()->prepare("
                INSERT INTO administrador 
                (nome, email, senha, telefone, data_nascimento, ip, data_registro, data_atualizacao) VALUES (
                :nome, 
                :email, 
                :senha, 
                :telefone,
                :dataNascimentoCompleta,
                :ip,
                NOW(),
                ''
                )
            ");

            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);
            $stmt->bindParam(":telefone", $this->telefone);
            $stmt->bindParam(":dataNascimentoCompleta", $dataNascimentoCompleta);
            $stmt->bindParam(":ip", $this->ip);
            $stmt->execute();
            return true;
        }catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
        
    }
}