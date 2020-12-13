<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\veiculo;

class FormularioVeiculoAlteraController implements InterfaceControleDeRequisicao
{
    private $repositorioDeVeiculos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeVeiculos = $entityManager
            ->getRepository(veiculo::class);
    }

    public function requisicao(): void
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false){
            header('Location: /listar-veiculo',true,302);
            return;
        }
        $veiculo = $this->repositorioDeVeiculos->find($id);
        $titulo = "Alterar de veiculo";
        require __DIR__ . '/../../view/veiculo/formulario-alterar.php';
    }
}