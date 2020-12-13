<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\veiculo;

class ListarVeiculoController implements InterfaceControleDeRequisicao
{
    use Traits;
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
        echo $this->renderizaHtml(
            'veiculo/listar-veiculo.php',
            [
                'veiculos' => $veiculos,
                'titulo' => 'Lista de veiculo'
            ]
        );
    }
}