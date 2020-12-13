<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;

class FormularioAlterarUsuarioController implements InterfaceControleDeRequisicao
{
    private $repositorioDeUsuario;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeUsuario = $entityManager
            ->getRepository(Usuario::class);
    }

    public function requisicao(): void
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false){
            header('Location: /lista-usuario');
            return;
        }
        $titulo = 'Alterar usuario';
        $usuario = $this->repositorioDeUsuario->find($id);
        require __DIR__.'/../../view/usuario/formulario-usuario-alterar.php';
    }
}