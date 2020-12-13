<?php require  __DIR__. '/../inicio-html.php';?>


<form action="/salva-usuario" method="post" >
    <input type="hidden" name="identificador" value="usuario">
    <div class="form-group input">
        <label for="usuario">Usuario</label>
        <input class="form-control" type="text" name="usuario" id="usuario" placeholder="usuario" required>
    </div>

    <div class="form-group espaco-input">
        <label for="senha">Senha</label>
        <input class="form-control" type="password" name="senha" id="senha" placeholder="*******" max="11" required>
    </div>
    <br>
    <div class="form-group espaco-input">
        <button class="btn btn-success btn-md col-md-3">
            Salvar
        </button>
    </div>

</form>

<?php  require __DIR__. '/../fim-html.php';?>
