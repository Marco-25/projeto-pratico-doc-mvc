<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;

class ListarUsuarioController implements InterfaceControleDeRequisicao
{
    use Traits;
    private $repositorioDeUsuario;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeUsuario = $entityManager->getRepository(Usuario::class);
    }

    public function requisicao(): void
    {
        $usuarios = $this->repositorioDeUsuario->findAll();
        echo $this->renderizaHtml(
            'usuario/listar-usuario.php',
            [
                'usuarios' => $usuarios,
                'titulo' => 'Lista de Usuarios'
            ]
        );
    }
}