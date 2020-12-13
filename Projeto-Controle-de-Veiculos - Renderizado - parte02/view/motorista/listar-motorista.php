<?php require  __DIR__. '/../inicio-html.php';?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Endereço</th>
            <th scope="col">Numero</th>
            <th scope="col">CNH</th>
            <th scope="col">#</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
<?php foreach ($motoristas as $motorista):?>
        <tr>
            <td><?=$motorista->getNome();?></td>
            <td><?=$motorista->getTelefone();?></td>
            <td><?=$motorista->getEndereco();?></td>
            <td><?=$motorista->getNumero();?></td>
            <td><?=$motorista->getCnh();?></td>
            <td>
                <a href="/alterar-motorista?id=<?=$motorista->getId(); ?>" class="btn btn-info btn-sm">
                    Alterar
                </a>
            </td>
            <td>
                <a href="javascript: if(confirm('tem certeza que deseja excluir?\n <?=$motorista->getNome();?>')) location.href = '/excluir-motorista?id=<?=$motorista->getId(); ?>';"
                   class="btn btn-danger btn-sm">
                    Excluir
                </a>
            </td>
        </tr>
<?php endforeach;?>
        </tbody>
    </table>

<?php require  __DIR__. '/../fim-html.php';?>