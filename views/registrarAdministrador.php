<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Increver-se - {Nome Site}</title>
    <!-- Bootstrap - CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body class="login">
    <?php require_once("./includes/cabecalho.php"); ?>
    
    <main>
        <section class="section-signup">
            <article class="article-signup">
                <form id="form-singup" method="POST">
                    <h3 class="title-signup">Inscreva-se</h3>
                    <div class="form-group margin-top--10">
                        <label for="nome">Nome Completo</label>
                        <input type="nome" class="form-control" id="nome" placeholder="Insira seu nome completo">
                        <small id="alert-nome" class="form-text hidden color-error">Insira seu nome completo.</small>
                    </div>
                    <div class="form-group margin-top--10">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Insira seu Email">
                        <small id="alert-email" class="form-text hidden color-error">Insira seu Email.</small>
                    </div>
                    <div class="form-group margin-top--10">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" minlength="5"placeholder="Insira sua da Senha">
                        <small id="alert-senha" class="form-text hidden color-error">Insira sua da Senha.</small>
                    </div>
                    <div class="form-group margin-top--10">
                        <label for="confirmar-senha">Confirmar sua senha</label>
                        <input type="password" class="form-control" id="confirmar-senha" placeholder="Insira sua senha novamente">
                        <small id="alert-confirm-senha" class="form-text hidden color-error">Insira sua senha novamente.</small>
                    </div>
                    <div class="form-group margin-top--10">
                        <label for="senha">Número de Telefone</label>
                        <input type="text" class="form-control" id="telefone" maxlength="15" placeholder="Insira seu número de telefone" onkeyup="verificaTelefone(event)">
                        <small id="alert-telefone" class="form-text hidden color-error">Insira seu Número de Telefone.</small>
                    </div>
                    <div class="form-group margin-top--10">
                        <label for="senha">Data Nascimento</label>

                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Dia" id="nascimento-dia" maxlength="2" onblur="verificaData('dia',$(this).val());">
                            </div>
                            <div class="col-md-4 col-select-mes">
                                <div class="select-mes">
                                    <select class="form-control" id="nascimento-mes" onblur="verificaData('mes',$(this).val());">
                                        <option selected disabled value>Mês</option>
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Ano" id="nascimento-ano" maxlength="4" onblur="verificaData('ano',$(this).val());">
                            </div>
                        </div>

                        <div class="row">
                            <small id="alert-data-dia" class="form-text d--none color-error">Insira um dia válido para o mês.</small>
                            <small id="alert-data-mes" class="form-text d--none color-error">Selecione o mês de nascimento.</small>
                            <small id="alert-data-ano" class="form-text d--none color-error"></small>
                        </div>
                    </div>

                    <button type="button" class="btn-submit margin-top--20 margin-bottom--20" onclick="verificarCadastro()">Entrar</button>
                </form>
            </article>
        </section>
    </main>
</body>

<!-- Jquery - JS-->    
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/registrarAdministrador.js" type="text/javascript"></script>