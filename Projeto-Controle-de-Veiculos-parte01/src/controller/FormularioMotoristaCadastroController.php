<?php


namespace Projeto\Pratico\controller;


class FormularioMotoristaCadastroController implements InterfaceControleDeRequisicao
{
    public function requisicao(): void
    {
        $titulo = "Cadastro de motorista";
        require __DIR__ . '/../../view/motorista/formulario-cadastro.php';
    }
}