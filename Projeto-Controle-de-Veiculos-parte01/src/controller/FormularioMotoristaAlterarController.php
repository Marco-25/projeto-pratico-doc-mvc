<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Motorista;

class FormularioMotoristaAlterarController implements InterfaceControleDeRequisicao
{
    /** @var $repositorioDeMotorista  */
    private $repositorioDeMotorista;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeMotorista = $entityManager
            ->getRepository(Motorista::class);
    }

    public function requisicao(): void
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false) {
            header('Location: /listar-motorista');
            return;
        }
        $motorista = $this->repositorioDeMotorista->find($id);
        $titulo = 'Alterar motorista';

        require __DIR__ . '/../../view/motorista/formulario-alterar.php';
    }
}