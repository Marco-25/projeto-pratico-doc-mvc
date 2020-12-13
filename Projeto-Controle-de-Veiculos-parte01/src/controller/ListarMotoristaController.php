<?php

namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Motorista;

class ListarMotoristaController implements InterfaceControleDeRequisicao
{
    /** @var  $repositorioDeMotorista **/
    private $repositorioDeMotorista;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeMotorista = $entityManager->getRepository(Motorista::class);
    }

    public function requisicao(): void
    {
            $titulo = "Lista de Motoristas";
            $motoristas = $this->repositorioDeMotorista->findAll();
            require __DIR__ . '/../../view/motorista/listar-motorista.php';
    }
}