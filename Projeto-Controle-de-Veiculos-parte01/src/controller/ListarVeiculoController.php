<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\veiculo;

class ListarVeiculoController implements InterfaceControleDeRequisicao
{
    private $repositorioDeVeiculo;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeVeiculo = $entityManager
            ->getRepository(veiculo::class);
    }

    public function requisicao(): void
    {
        $veiculos = $this->repositorioDeVeiculo->findAll();
        $titulo = "Lista de veiculo";
        require __DIR__ . '/../../view/veiculo/listar-veiculo.php';
    }
}