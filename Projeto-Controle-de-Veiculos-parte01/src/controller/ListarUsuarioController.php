<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;

class ListarUsuarioController implements InterfaceControleDeRequisicao
{
    private $repositorioDeUsuario;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeUsuario = $entityManager->getRepository(Usuario::class);
    }

    public function requisicao(): void
    {
        $titulo = 'Lista de Usuarios';
        $usuarios = $this->repositorioDeUsuario->findAll();
        require __DIR__.'/../../view/usuario/listar-usuario.php';
    }
}