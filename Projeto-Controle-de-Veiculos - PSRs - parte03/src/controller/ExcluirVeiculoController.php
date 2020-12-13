<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\veiculo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExcluirVeiculoController implements RequestHandlerInterface
{
    use Traits;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false) {
            header('Location: /listar-veiculo');
            exit();
        }

        /** @var  $motorista */
        $veiculo = $this->entityManager->getReference(veiculo::class,$id);
        $this->entityManager->remove($veiculo);
        $this->entityManager->flush();
        $this->definirMensagem(
            'success',
            'Veiculo excluido com sucesso.'
        );
        return new Response(200,['Location' => 'listar-veiculo'],'');
    }
}