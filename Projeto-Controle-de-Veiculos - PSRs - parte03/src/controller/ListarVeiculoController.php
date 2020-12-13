<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\veiculo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarVeiculoController implements RequestHandlerInterface
{
    use Traits;
    private $repositorioDeVeiculo;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeVeiculo = $entityManager
            ->getRepository(veiculo::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $veiculos = $this->repositorioDeVeiculo->findAll();
        $html = $this->renderizaHtml(
            'veiculo/listar-veiculo.php',
            [
                'veiculos' => $veiculos,
                'titulo' => 'Lista de veiculo'
            ]
        );
        return new Response(200,[],$html);
    }
}