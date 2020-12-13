<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Projeto\Pratico\model\veiculo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class XmlListarVeiculos implements RequestHandlerInterface
{
    private ObjectRepository $repositorioDeVeiculos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeVeiculos = $entityManager
            ->getRepository(veiculo::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var veiculo[] $veiculos */
        $veiculos = $this->repositorioDeVeiculos->findAll();
        $veiculosEmXml = new \SimpleXMLElement('<veiculo/>');

        foreach ($veiculos as $veiculo) {
            $veiculoXML = $veiculosEmXml->addChild('veiculo');
            $veiculoXML->addChild('id',$veiculo->getId());
            $veiculoXML->addChild('descricao',$veiculo->getDescricao());
            $veiculoXML->addChild('marca',$veiculo->getMarca());
            $veiculoXML->addChild('ano',$veiculo->getAno());
            $veiculoXML->addChild('modelo',$veiculo->getModelo());
            $veiculoXML->addChild('cor',$veiculo->getCor());
        }
        return new Response(200,['Content-Type' => 'application/xml'],$veiculosEmXml->asXML());
    }
}