<?php require  __DIR__. '/../inicio-html.php';?>


    <form action="/salva-motorista?id=<?=$motorista->getId(); ?>" method="post" >
        <input type="hidden" name="identificador" value="motorista">
        <div class="form-group espaco-input">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" value="<?=$motorista->getNome(); ?>" name="nome" id="nome" required>
        </div>

        <div class="form-group espaco-input">
            <label for="telefone">Telefone</label>
            <input class="form-control" type="tel" value="<?=$motorista->getTelefone(); ?>" name="telefone" id="telefone"  max="11" required>
        </div>

        <div class="row espaco-input">
            <div class="form-group col-md-10">
                <label for="endereco">Endereço</label>
                <input class="form-control" type="text" value="<?=$motorista->getEndereco(); ?>" name="endereco" id="endereco"  min="6" required>
            </div>
            <div class="form-group col-md-2">
                <label for="numero">Nº </label>
                <input class="form-control" type="text" value="<?=$motorista->getNumero(); ?>" name="numero" id="numero"  max="5" required>
            </div>
        </div>

        <div class="form-group espaco-input">
            <label for="cnh">CNH</label>
            <input class="form-control" type="text" value="<?=$motorista->getCnh(); ?>" name="cnh" id="cnh" max="11">
        </div>

        <br>
       <div class="form-group espaco-input">
           <button class="btn btn-primary btn-md">
               Salvar
           </button>
       </div>

    </form>

<?php  require __DIR__. '/../fim-html.php';?>