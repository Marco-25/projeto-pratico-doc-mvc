<?php

namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\Motorista;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarMotoristaController implements RequestHandlerInterface
{
    use Traits;
    /** @var  $repositorioDeMotorista **/
    private $repositorioDeMotorista;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeMotorista = $entityManager
            ->getRepository(Motorista::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
            $motoristas = $this->repositorioDeMotorista->findAll();
        $html = $this->renderizaHtml(
                'motorista/listar-motorista.php',
                [
                    'motoristas' => $motoristas,
                    'titulo' => 'Lista de Motoristas'
                ]
            );
        return new Response(200,[],$html);
    }
}