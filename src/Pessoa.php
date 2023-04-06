<?php

namespace bolao\class\Pessoa;

abstract class Pessoa
{
    protected $nome;
    protected $email;
    protected $senha;
    protected $telefone;
    protected $nascimentoDia;
    protected $nascimentoMes;
    protected $nascimentoAno;
    protected $ip;

    public function __construct($nome, $email,$senha,$nascimentoDia, $nascimentoMes, $nascimentoAno, $telefone)
    {
        $this->nome     = $nome;
        $this->email    = $email;
        $this->telefone = $telefone;
        $this->senha    = md5($senha);
        $this->ip       = $this->getClientIP();
        $this->nascimentoDia = (int) $nascimentoDia;
        $this->nascimentoMes = (int) $nascimentoMes;
        $this->nascimentoAno = (int) $nascimentoAno;
    }

    // Versão completa da Data de Nascimento na versão brasileira
    public function getDataNascimentoBR()
    {
        //Acrescenta o zero na frente para data ficar completa
        $nascimentoDia = strlen($this->nascimentoDia) > 1 ? $this->nascimentoDia : '0'.$this->nascimentoDia;
        $nascimentoMes = strlen($this->nascimentoMes) > 1 ? $this->nascimentoMes : '0'.$this->nascimentoMes;

        return $nascimentoDia . '/' . $nascimentoMes . '/' . $this->nascimentoAno;
    }

    // Retonar o IP do cliente
    private function getClientIP() {
        $ipaddress = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(!empty($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(!empty($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(!empty($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(!empty($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN'; 
   
        return $ipaddress; 
   }

   
}