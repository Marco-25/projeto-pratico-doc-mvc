<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioAlterarUsuarioController implements RequestHandlerInterface
{
    use Traits;
    private $repositorioDeUsuario;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeUsuario = $entityManager
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false){
            header('Location: /lista-usuario');
            exit();
        }

        $usuario = $this->repositorioDeUsuario->find($id);
        $html = $this->renderizaHtml(
            'usuario/formulario-usuario-alterar.php',
            [
                'usuario' => $usuario,
                'titulo' => 'Alterar usuario'
            ]
        );

        return new Response(200,[],$html);
    }
}