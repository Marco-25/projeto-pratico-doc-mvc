<?php


namespace Projeto\Pratico\controller;


class LoginController implements InterfaceControleDeRequisicao
{

    public function requisicao(): void
    {
        require __DIR__ . '/../../view/login.php';
    }
}