<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Projeto\Pratico\model\Motorista;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class XmlListarMotorista implements RequestHandlerInterface
{
    private ObjectRepository $repositorioDeMotoristas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeMotoristas = $entityManager
            ->getRepository(Motorista::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var Motorista[] $motoristas */
        $motoristas = $this->repositorioDeMotoristas->findAll();
        $motoristasEmXML = new \SimpleXMLElement('<motorista/>');

        foreach ($motoristas as $motorista) {
            $motoristaXML = $motoristasEmXML->addChild('motorista');
            $motoristaXML->addChild('id',$motorista->getId());
            $motoristaXML->addChild('nome',$motorista->getNome());
            $motoristaXML->addChild('telefone',$motorista->getTelefone());
            $motoristaXML->addChild('endereco',$motorista->getEndereco());
            $motoristaXML->addChild('numero',$motorista->getNumero());
            $motoristaXML->addChild('cnh',$motorista->getCnh());
        }
        return new Response(200,['Content-Type' => 'application/xml'],$motoristasEmXML->asXML());
    }
}