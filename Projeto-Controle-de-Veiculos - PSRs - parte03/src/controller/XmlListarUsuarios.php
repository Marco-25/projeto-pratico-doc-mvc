<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\model\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class XmlListarUsuarios implements RequestHandlerInterface
{
    private \Doctrine\Persistence\ObjectRepository $repositorioDeUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeUsuarios = $entityManager
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var Usuario[] $usuarios */
        $usuarios = $this->repositorioDeUsuarios->findAll();
        $usuariosEmXml = new \SimpleXMLElement('<usuario/>');

        foreach ($usuarios as $usuario) {
            $usuarioXML = $usuariosEmXml->addChild('usuario');
            $usuarioXML->addChild('id', $usuario->getId());
            $usuarioXML->addChild('usuario', $usuario->getNome());
            $usuarioXML->addChild('senha', $usuario->getSenha());
        }
        return new Response(200,['Content-Type' => 'application/xml'],$usuariosEmXml->asXML());
    }
}