<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\veiculo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioVeiculoAlteraController implements RequestHandlerInterface
{
    use Traits;
    private $repositorioDeVeiculos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeVeiculos = $entityManager
            ->getRepository(veiculo::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false){
            header('Location: /listar-veiculo',true,302);
            exit();
        }
        $veiculo = $this->repositorioDeVeiculos->find($id);
        $html = $this->renderizaHtml(
            'veiculo/formulario-alterar.php',
            [
                'veiculo' => $veiculo,
                'titulo' => 'Alterar de veiculo'
            ]
        );
        return new Response(200,[],$html);
    }
}