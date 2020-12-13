<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;

class RealizarLoginController implements InterfaceControleDeRequisicao
{
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
            echo "<p class='text-danger'>Usuario errado ou inesxistente</p>";
            header('Location: /login', true,200);
            return;
        }
        $pass = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);

        /** @var Usuario $user */
        $user = $this->repositorioDeUsuarios
            ->findOneBy(['nome' => $user]);

        if (!$user->senhaCorreta($pass)) {
            echo "Senha errada..." . $pass;

            header('Location: /login',true,200);
            return;
        }

        $_SESSION['logado'] = true;
        header('Location: /listar-motorista', true,302);

    }
}