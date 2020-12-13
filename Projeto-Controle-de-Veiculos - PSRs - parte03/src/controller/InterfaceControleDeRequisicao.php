<?php


namespace Projeto\Pratico\controller;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface InterfaceControleDeRequisicao
{
    public function requisicao(ServerRequestInterface $request):  ResponseInterface;
}