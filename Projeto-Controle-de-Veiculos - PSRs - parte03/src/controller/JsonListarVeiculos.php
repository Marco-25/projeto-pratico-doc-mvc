<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Projeto\Pratico\model\veiculo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JsonListarVeiculos implements RequestHandlerInterface
{
    private ObjectRepository $repositorioDeVeiculos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeVeiculos = $entityManager
            ->getRepository(veiculo::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $veiculos = $this->repositorioDeVeiculos->findAll();
        return new Response(200,['Content-Type' => 'application/json'],json_encode($veiculos));
    }
}