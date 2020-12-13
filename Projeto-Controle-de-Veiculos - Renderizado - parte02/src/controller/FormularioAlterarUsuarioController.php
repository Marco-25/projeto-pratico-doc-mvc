<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;

class FormularioAlterarUsuarioController implements InterfaceControleDeRequisicao
{
    use Traits;
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

        $usuario = $this->repositorioDeUsuario->find($id);
        echo $this->renderizaHtml(
            'usuario/formulario-usuario-alterar.php',
            [
                'usuario' => $usuario,
                'titulo' => 'Alterar usuario'
            ]
        );
    }
}