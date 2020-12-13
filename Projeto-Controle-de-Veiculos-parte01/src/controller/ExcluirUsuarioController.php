<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Usuario;

class ExcluirUsuarioController implements InterfaceControleDeRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();

    }

    public function requisicao(): void
    {
        $id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false){
            header('Location: /lista-usuario',true,302);
            return;
        }
        $usuario = $this->entityManager->getReference(Usuario::class,$id);
        $this->entityManager->remove($usuario);
        $this->entityManager->flush();
        header('Location: /lista-usuario',true,302);
    }
}