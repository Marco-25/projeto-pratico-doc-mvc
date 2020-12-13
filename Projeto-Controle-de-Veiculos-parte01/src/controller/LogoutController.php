<?php


namespace Projeto\Pratico\controller;


class LogoutController implements InterfaceControleDeRequisicao
{

    public function requisicao(): void
    {
       session_destroy();
       header('Location: /login');
    }
}