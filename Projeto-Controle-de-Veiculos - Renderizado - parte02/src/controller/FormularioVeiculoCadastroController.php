<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;

class FormularioVeiculoCadastroController implements InterfaceControleDeRequisicao
{
    use Traits;
    public function requisicao(): void
    {
        echo $this->renderizaHtml(
            'veiculo/formulario-cadastro.php',
            [
                'titulo' => 'Cadastro de veiculo'
            ]
        );
    }
}