<?php require  __DIR__. '/../inicio-html.php';?>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Descrição</th>
        <th scope="col">Marca</th>
        <th scope="col">Ano</th>
        <th scope="col">Modelo</th>
        <th scope="col">Cor</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($veiculos as $veiculo):?>
        <tr>

            <td><?=$veiculo->getDescricao();?></td>
            <td><?=$veiculo->getMarca();?></td>
            <td><?=$veiculo->getAno();?></td>
            <td><?=$veiculo->getModelo();?></td>
            <td><?=$veiculo->getCor();?></td>
            <td>
                <a href="/alterar-veiculo?id=<?=$veiculo->getId(); ?>" class="btn btn-info btn-sm">
                    Alterar
                </a>
            </td>
            <td>
                <a href="javascript: if(confirm('tem certeza que deseja excluir?')) location.href = '/excluir-veiculo?id=<?=$veiculo->getId(); ?>';"
                   class="btn btn-danger btn-sm">
                    Excluir
                </a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php require  __DIR__. '/../fim-html.php';?>