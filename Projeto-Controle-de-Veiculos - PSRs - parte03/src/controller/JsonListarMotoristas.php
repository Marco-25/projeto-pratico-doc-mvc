<?php

namespace Projeto\Pratico\controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Projeto\Pratico\model\Motorista;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JsonListarMotoristas implements RequestHandlerInterface
{

    private ObjectRepository $repositorioDeMotoristas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeMotoristas = $entityManager
            ->getRepository(Motorista::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $motoristas = $this->repositorioDeMotoristas->findAll();
        return new Response(200,['Content-Type' => 'application/json'],json_encode($motoristas));
    }
}