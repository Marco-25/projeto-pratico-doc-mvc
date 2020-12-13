<?php
/**
 *caso de erro ao excluir executar esse comando vendor\bin\doctrine orm:generate-proxies
 */

namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\Motorista;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExcluirMotoristaController implements RequestHandlerInterface
{
    use Traits;
    /** @var \Doctrine\ORM\EntityManagerInterface  */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false) {
            header('Location: /listar-motorista');
            exit();
        }

        /** @var  $motorista */
        $motoristas = $this->entityManager->getReference(Motorista::class,$id);
        $this->entityManager->remove($motoristas);
        $this->entityManager->flush();
        $this->definirMensagem(
            'success',
            'Motorista excluido com sucesso'
        );
        return new Response(200,['Location' => '/listar-motorista'],'');
    }
}