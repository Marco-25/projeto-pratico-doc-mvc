<?php


namespace Projeto\Pratico\controller;


use Nyholm\Psr7\Response;
use Projeto\Pratico\helper\Traits;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioUsuarioCadastroController implements RequestHandlerInterface
{
    use Traits;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml(
            'usuario/formulario-usuario.php',
            [
                'titulo' => 'Cadastrar usuario'
            ]
        );
        return new Response(200,[],$html);
    }
}