<?php
/**
 *caso de erro ao excluir executar esse comando vendor\bin\doctrine orm:generate-proxies
 */

namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Motorista;

class ExcluirMotoristaController implements InterfaceControleDeRequisicao
{
    /** @var \Doctrine\ORM\EntityManagerInterface  */
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
            header('Location: /listar-motorista');
            return;
        }

        /** @var  $motorista */
        $motoristas = $this->entityManager->getReference(Motorista::class,$id);
        $this->entityManager->remove($motoristas);
        $this->entityManager->flush();
        header('Location: /listar-motorista');
    }
}