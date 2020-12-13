<?php


namespace Projeto\Pratico\controller;


class FormularioUsuarioCadastroController implements InterfaceControleDeRequisicao
{

    public function requisicao(): void
    {
        $titulo = 'Cadastrar usuario';
        require __DIR__ .'/../../view/usuario/formulario-usuario.php';
    }
}