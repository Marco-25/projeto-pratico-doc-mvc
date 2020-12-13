<?php require  __DIR__. '/../inicio-html.php';?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" class="col-md-10">Usuario</th>
            <th>#</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario):?>
            <tr>
                <td class="col-md-10"><?=$usuario->getNome();?></td>

                <td>
                    <a href="/alterar-usuario?id=<?=$usuario->getId(); ?>" class="btn btn-info btn-sm">
                        Alterar
                    </a>
                </td>
                <td>
                    <a href="javascript: if(confirm('tem certeza que deseja excluir?\n <?=$usuario->getNome();?>')) location.href = '/excluir-usuario?id=<?=$usuario->getId(); ?>';"
                       class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

<?php require  __DIR__. '/../fim-html.php';?>