<?php


namespace Projeto\Pratico\controller;


use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLoginController implements RequestHandlerInterface
{
    use Traits;
    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManger = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeUsuarios = $entityManger
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $user = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        if (is_null($user) || $user === false) {
            $this->definirMensagem(
                'danger',
                'Usuario errado ou inesxistente'
            );
            header('Location: /login', true,302);
            exit();
        }
        $pass = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);

        /** @var Usuario $user */
        $user = $this->repositorioDeUsuarios
            ->findOneBy(['nome' => $user]);

        if (is_null($user) || !$user->senhaCorreta($pass)) {
            $this->definirMensagem(
                'danger',
                'Usuario e/ou senha errada!!!'
            );
            header('Location: /login',true,302);
            exit();
        }

        $_SESSION['logado'] = true;
        return new Response(200,['Location' => 'listar-motorista','']);

    }
}