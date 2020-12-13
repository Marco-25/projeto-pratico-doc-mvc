<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;

class FormularioMotoristaCadastroController implements InterfaceControleDeRequisicao
{
    use Traits;
    public function requisicao(): void
    {
        echo $this->renderizaHtml(
            'motorista/formulario-cadastro.php',
            [
                'titulo' => 'Cadastro de motorista'
            ]
        );
    }
}