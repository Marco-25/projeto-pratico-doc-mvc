<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\veiculo;

class ExcluirVeiculoController implements InterfaceControleDeRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function requisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false) {
            header('Location: /listar-veiculo');
            return;
        }

        /** @var  $motorista */
        $veiculo = $this->entityManager->getReference(veiculo::class,$id);
        $this->entityManager->remove($veiculo);
        $this->entityManager->flush();
        header('Location: /listar-veiculo');
    }
}