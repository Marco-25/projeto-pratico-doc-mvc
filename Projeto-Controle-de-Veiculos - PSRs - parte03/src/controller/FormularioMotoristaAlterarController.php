<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Projeto\Pratico\model\Motorista;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioMotoristaAlterarController implements RequestHandlerInterface
{
    use Traits;
    /** @var $repositorioDeMotorista  */
    private $repositorioDeMotorista;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeMotorista = $entityManager
            ->getRepository(Motorista::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false) {
            header('Location: /listar-motorista');
            exit();
        }
        $motorista = $this->repositorioDeMotorista->find($id);
        $html = $this->renderizaHtml(
            'motorista/formulario-alterar.php',
            [
                'motorista' => $motorista,
                'titulo' => 'Alterar motorista'
            ]
        );
        return new Response(200,[],$html);
    }
}