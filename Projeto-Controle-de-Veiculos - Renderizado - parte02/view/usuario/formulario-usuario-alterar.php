<?php require  __DIR__. '/../inicio-html.php';?>


<form action="/salva-usuario?id=<?=$usuario->getId(); ?>" method="post" >
    <input type="hidden" name="identificador" value="usuario">
    <div class="form-group input">
        <label for="usuario">Usuario</label>
        <input class="form-control" type="text" name="usuario" id="usuario" value="<?=$usuario->getNome(); ?>" disabled>
    </div>
    <br>
    <div class="form-group espaco-input">
        <label for="senha">Nova senha</label>
        <input class="form-control" type="password" name="senha" id="senha" required>
    </div>
    <br>
    <div class="form-group espaco-input">
        <button class="btn btn-success btn-md col-md-3">
            Salvar
        </button>
    </div>

</form>

<?php  require __DIR__. '/../fim-html.php';?>
