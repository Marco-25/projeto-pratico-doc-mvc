<?php

namespace Projeto\Pratico\controller;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\model\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JsonListarUsuarios implements RequestHandlerInterface
{
    private \Doctrine\Persistence\ObjectRepository $repositorioDeUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeUsuarios = $entityManager
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $usuarios = $this->repositorioDeUsuarios->findAll();
        return new Response(200,['Content-Type' => 'application/json'],json_encode($usuarios));
    }
}