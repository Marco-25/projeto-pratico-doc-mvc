<?php

namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Motorista;

class ListarMotoristaController implements InterfaceControleDeRequisicao
{
    use Traits;
    /** @var  $repositorioDeMotorista **/
    private $repositorioDeMotorista;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeMotorista = $entityManager->getRepository(Motorista::class);
    }

    public function requisicao(): void
    {
            $motoristas = $this->repositorioDeMotorista->findAll();
        echo $this->renderizaHtml(
                'motorista/listar-motorista.php',
                [
                    'motoristas' => $motoristas,
                    'titulo' => 'Lista de Motoristas'
                ]
            );
    }
}