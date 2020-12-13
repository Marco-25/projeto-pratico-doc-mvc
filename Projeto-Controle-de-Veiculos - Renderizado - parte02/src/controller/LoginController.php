<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;

class LoginController implements InterfaceControleDeRequisicao
{
    use Traits;

    public function requisicao(): void
    {
        echo $this->renderizaHtml(
            'login.php',
            []
        );
    }
}