<?php

    require_once '../src/Conexao.php';
    require_once '../src/Pessoa.php';
    require_once '../src/Administrador.php';
    require_once '../src/SQLInjectionProtection.php';
    require_once '../vendor/autoload.php';

    use bolao\class\Conexao\Conexao;
    use bolao\class\Administrador\Administrador;
    use bolao\class\SQLInjectionProtection\SQLInjectionProtection;

    $segurancaSQLInjection = new SQLInjectionProtection();

    $nome          = $segurancaSQLInjection->protect($_POST["nome"]);
    $email         = $segurancaSQLInjection->protect($_POST["email"]);
    $senha         = $segurancaSQLInjection->protect($_POST["senha"]);
    $telefone      = $segurancaSQLInjection->protect($_POST["telefone"]);
    $nascimentoDia = $segurancaSQLInjection->protect($_POST["nascimentoDia"]);
    $nascimentoMes = $segurancaSQLInjection->protect($_POST["nascimentoMes"]);
    $nascimentoAno = $segurancaSQLInjection->protect($_POST["nascimentoAno"]);

    $administrador = new Administrador($nome, $email, $senha, $nascimentoDia, $nascimentoMes, $nascimentoAno, $telefone);

    $administrador->criarNovoAdministrador();
    
?>