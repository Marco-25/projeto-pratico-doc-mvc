<?php

namespace Projeto\Pratico\helper;

trait Traits
{
    public function renderizaHtml(string $caminhoDotemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require __DIR__.'/../../view/' . $caminhoDotemplate;
        $html = ob_get_clean();

        return $html;
    }

    public function definirMensagem(string $tipo, string $mensagem): void
    {
        $_SESSION['tipo_mensagem'] = $tipo;
        $_SESSION['mensagem'] = $mensagem;
    }

}