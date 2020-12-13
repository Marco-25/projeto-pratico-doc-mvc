<?php


namespace Projeto\Pratico\controller;


use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioMotoristaCadastroController implements RequestHandlerInterface
{
    use Traits;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml(
            'motorista/formulario-cadastro.php',
            [
                'titulo' => 'Cadastro de motorista'
            ]
        );
        return new Response(200,[],$html);
    }
}