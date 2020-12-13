<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        .espaco{padding: 20px 10px; background: #ccc;margin-bottom: 50px}
        ul {margin-left: 600px}
        li {padding: 0 20px;}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>



<nav class="navbar navbar-expand-md navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand text-white leftt" href="/listar-motorista">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home
        </a>
        <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="/cadastro-usuario" class="nav-link text-white ">Cadastrar usuario</a>
                </li>
                <li class="nav-item">
                    <a href="/lista-usuario" class="nav-link text-white ">Usuarios</a>
                </li>

                <li class="nav-item">
                    <a href="/logout" class="nav-link text-danger">SAIR</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="jumbotron espaco">
        <h1 class="d-flex justify-content-between"><?= $titulo ?></h1>
    </div>

    <div>
        <a href="/formulario-motorista" class="btn btn-primary btn-sm">
            Cadastrar Motorista
        </a>

        <a href="/listar-veiculo" class="btn btn-info btn-sm">
            Listar Veiculos
        </a>

        <a href="/cadastrar-veiculo" class="btn btn-success btn-sm">
            Cadastrar Veiculo
        </a>

    </div>
    <br>

    <div class="alert alert-<?=$_SESSION['tipo_mensagem'];?>">
        <?= isset($_SESSION['tipo_mensagem']) ? $_SESSION['mensagem']: '';?>
    </div>

    <?php unset($_SESSION['tipo_mensagem'])?>
    <?php unset($_SESSION['tipo_mensagem']);?>




