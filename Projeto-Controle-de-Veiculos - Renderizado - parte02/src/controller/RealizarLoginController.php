<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;

class RealizarLoginController implements InterfaceControleDeRequisicao
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

    public function requisicao(): void
    {
        $user = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        if (is_null($user) || $user === false) {
            $this->definirMensagem(
                'danger',
                'Usuario errado ou inesxistente'
            );
            header('Location: /login', true,302);
            return;
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
            return;
        }

        $_SESSION['logado'] = true;
        header('Location: /listar-motorista', true,302);

    }
}