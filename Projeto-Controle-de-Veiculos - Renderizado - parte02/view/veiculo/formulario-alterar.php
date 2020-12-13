<?php require  __DIR__. '/../inicio-html.php';?>


    <form action="/salva-veiculo?id=<?=$veiculo->getId(); ?>" method="post" >
        <input type="hidden" name="identificador" value="veiculo">
        <div class="form-group input">
            <label for="descricao">Descrição</label>
            <input class="form-control" type="text" name="descricao" id="descricao" value="<?=$veiculo->getDescricao(); ?>" required>
        </div>

        <div class="form-group espaco-input">
            <label for="marca">Marca</label>
            <input class="form-control" type="tel" name="marca" id="marca" value="<?=$veiculo->getMarca(); ?>" max="11" required>
        </div>

        <div class="row espaco-input">
            <div class="form-group col-md-6">
                <label for="ano">Ano</label>
                <input class="form-control" type="text" name="ano" id="ano" value="<?=$veiculo->getAno(); ?>" min="6" required>
            </div>
            <div class="form-group col-md-6">
                <label for="modelo">Modelo </label>
                <input class="form-control" type="text" name="modelo" id="modelo" value="<?=$veiculo->getModelo(); ?>" max="5" required>
            </div>
        </div>

        <div class="form-group espaco-input">
            <label for="cor">Cor</label>
            <input class="form-control" type="text" name="cor" id="cor" value="<?=$veiculo->getCor(); ?>" max="11">
        </div>

        <br>
        <div class="form-group espaco-input">
            <button class="btn btn-success btn-md">
                Salvar
            </button>
        </div>

    </form>

<?php  require __DIR__. '/../fim-html.php';?>