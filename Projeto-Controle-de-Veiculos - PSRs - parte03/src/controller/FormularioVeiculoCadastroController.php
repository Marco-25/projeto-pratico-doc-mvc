<?php


namespace Projeto\Pratico\controller;


use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioVeiculoCadastroController implements RequestHandlerInterface
{
    use Traits;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml(
            'veiculo/formulario-cadastro.php',
            [
                'titulo' => 'Cadastro de veiculo'
            ]
        );
        return new Response(200,[],$html);
    }
}