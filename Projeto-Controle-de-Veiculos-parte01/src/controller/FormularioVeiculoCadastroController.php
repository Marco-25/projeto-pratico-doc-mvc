<?php


namespace Projeto\Pratico\controller;


class FormularioVeiculoCadastroController implements InterfaceControleDeRequisicao
{

    public function requisicao(): void
    {
        $titulo = "Cadastro de veiculo";
        require __DIR__ . '/../../view/veiculo/formulario-cadastro.php';
    }
}