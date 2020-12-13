<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background: rgba(200,200,200, .5);
        }
        form {
            border: 3px solid lightslategray;
            border-radius: 50px 30px;
            width: 700px;
            margin: 0 auto;
            padding: 50px 0;
            background: #cccccc;
        }
        .box {
            padding: 70px 0;
        }
        .pad {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <h3 class="text-center text-black pt-5 pad">
            <strong class="text-decoration-underline">Controle de Motorista e Veiculo</strong>
        </h3>
        <div class="box">
            <form action="/realizar-login" method="post" class="justify-content-center align-items-center">

                <div class="form-group col-md-8 offset-2">
                    <label for="usuario">Usuario</label>
                    <input class="form-control" type="text" name="usuario" id="usuario"  required>
                </div>

                <div class="form-group col-md-8 offset-2">
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha" max="11" required>
                </div>
                <br>
                <div class="form-group col-md-8 offset-2">
                    <button class="btn btn-success btn-mb col-md-3">
                        Logar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>