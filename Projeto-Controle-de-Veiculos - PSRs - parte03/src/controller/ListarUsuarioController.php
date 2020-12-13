<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarUsuarioController implements RequestHandlerInterface
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
        $usuarios = $this->repositorioDeUsuario->findAll();
        $html = $this->renderizaHtml(
            'usuario/listar-usuario.php',
            [
                'usuarios' => $usuarios,
                'titulo' => 'Lista de Usuarios'
            ]
        );
        return new Response(200,[],$html);
    }
}