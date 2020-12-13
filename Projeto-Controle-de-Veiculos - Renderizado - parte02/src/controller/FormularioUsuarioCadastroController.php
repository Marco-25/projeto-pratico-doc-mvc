<?php


namespace Projeto\Pratico\controller;


use Projeto\Pratico\helper\Traits;

class FormularioUsuarioCadastroController implements InterfaceControleDeRequisicao
{
    use Traits;
    public function requisicao(): void
    {
        echo $this->renderizaHtml(
            'usuario/formulario-usuario.php',
            [
                'titulo' => 'Cadastrar usuario'
            ]
        );
    }
}