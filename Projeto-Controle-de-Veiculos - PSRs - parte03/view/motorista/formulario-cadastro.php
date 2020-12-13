<?php require  __DIR__. '/../inicio-html.php';?>


    <form action="/salva-motorista" method="post" >
        <input type="hidden" name="identificador" value="motorista">
        <div class="form-group espaco-input">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Seu nome completo" required>
        </div>

        <div class="form-group espaco-input">
            <label for="telefone">Telefone</label>
            <input class="form-control" type="tel" name="telefone" id="telefone" placeholder="00 9999 9999" max="11" required>
        </div>

        <div class="row espaco-input">
            <div class="form-group col-md-10">
                <label for="endereco">Endereço</label>
                <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Rua nome da rua" min="6" required>
            </div>
            <div class="form-group col-md-2">
                <label for="numero">Nº </label>
                <input class="form-control" type="text" name="numero" id="numero" placeholder="1478" max="5" required>
            </div>
        </div>

        <div class="form-group espaco-input">
            <label for="cnh">CNH</label>
            <input class="form-control" type="text" name="cnh" id="cnh" placeholder="numero da CNH" max="11">
        </div>

        <br>
       <div class="form-group espaco-input">
           <button class="btn btn-primary btn-md">
               Salvar
           </button>
       </div>

    </form>

<?php  require __DIR__. '/../fim-html.php';?>