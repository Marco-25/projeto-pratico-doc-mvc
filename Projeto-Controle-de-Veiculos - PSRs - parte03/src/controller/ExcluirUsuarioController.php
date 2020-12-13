<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExcluirUsuarioController implements RequestHandlerInterface
{
    use Traits;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false){
            header('Location: /lista-usuario',true,302);
            exit();
        }
        $usuario = $this->entityManager->getReference(Usuario::class,$id);
        $this->entityManager->remove($usuario);
        $this->entityManager->flush();
        $this->definirMensagem(
            'success',
            'Usuario excluido com sucesso.'
        );
        return new Response(200,['Location' => 'lista-usuario'],'');
    }
}