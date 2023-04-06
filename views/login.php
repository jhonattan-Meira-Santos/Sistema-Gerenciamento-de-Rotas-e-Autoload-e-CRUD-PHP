<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - {Nome Site}</title>
    <!-- Bootstrap - CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body class="login">
    <?php require_once("./includes/cabecalho.php"); ?>

    <main class="main-login">
        <section>
            <article>
                <form id="form-standard" method="POST">
                    <h3>Entre na sua conta</h3>
                    <div class="form-group margin-top--20">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="alert-email" class="form-text hidden color-error">Preencha o Campo do Email.</small>
                    </div>
                    <div class="form-group margin-top--20">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" placeholder="Password">
                        <small id="alert-senha" class="form-text hidden color-error">Preencha o Campo da Senha.</small>
                    </div>
                    <button type="button" class="btn-submit margin-top--20" onclick="verificarLogin()">Entrar</button>
                </form>
            </article>
        </section>
    </main>
</body>

 <!-- Jquery - JS-->
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/login.js" type="text/javascript"></script>