<?php

use Projeto\Pratico\controller\ExcluirMotoristaController;
use Projeto\Pratico\controller\ExcluirUsuarioController;
use Projeto\Pratico\controller\ExcluirVeiculoController;
use Projeto\Pratico\controller\FormularioAlterarUsuarioController;
use Projeto\Pratico\controller\FormularioMotoristaAlterarController;
use Projeto\Pratico\controller\FormularioMotoristaCadastroController;
use Projeto\Pratico\controller\FormularioVeiculoAlteraController;
use Projeto\Pratico\controller\JsonListarMotoristas;
use Projeto\Pratico\controller\JsonListarUsuarios;
use Projeto\Pratico\controller\JsonListarVeiculos;
use Projeto\Pratico\controller\ListarMotoristaController;
use Projeto\Pratico\controller\ListarUsuarioController;
use Projeto\Pratico\controller\ListarVeiculoController;
use Projeto\Pratico\controller\LoginController;
use Projeto\Pratico\controller\LogoutController;
use Projeto\Pratico\controller\Persistencia;
use Projeto\Pratico\controller\FormularioVeiculoCadastroController;
use Projeto\Pratico\controller\FormularioUsuarioCadastroController;
use Projeto\Pratico\controller\RealizarLoginController;
use Projeto\Pratico\controller\XmlListarMotorista;
use Projeto\Pratico\controller\XmlListarUsuarios;
use Projeto\Pratico\controller\XmlListarVeiculos;

return [
    #rotas de motorista
    '/listar-motorista' => ListarMotoristaController::class,
    '/formulario-motorista' => FormularioMotoristaCadastroController::class,
    '/salva-motorista' => Persistencia::class,
    '/alterar-motorista' => FormularioMotoristaAlterarController::class,
    '/excluir-motorista' => ExcluirMotoristaController::class,
    #rotas de veiculo
    '/cadastrar-veiculo' => FormularioVeiculoCadastroController::class,
    '/salva-veiculo' => Persistencia::class,
    '/alterar-veiculo' => FormularioVeiculoAlteraController::class,
    '/listar-veiculo' => ListarVeiculoController::class,
    '/excluir-veiculo' => ExcluirVeiculoController::class,
    #cadastro de usuario
    '/cadastro-usuario' => FormularioUsuarioCadastroController::class,
    '/salva-usuario' => Persistencia::class,
    '/lista-usuario' => ListarUsuarioController::class,
    '/alterar-usuario' => FormularioAlterarUsuarioController::class,
    '/excluir-usuario' => ExcluirUsuarioController::class,
    #rotas de login
    '/login' => LoginController::class,
    '/realizar-login' => RealizarLoginController::class,
    '/logout' => LogoutController::class,
    #json
    '/jsonListarMotoristas' => JsonListarMotoristas::class,
    '/jsonListarVeiculos' => JsonListarVeiculos::class,
    '/jsonListarUsuarios' => JsonListarUsuarios::class,
    #xml
    '/xmlListarMotoristas' => XmlListarMotorista::class,
    '/xmlListarVeiculos' => XmlListarVeiculos::class,
    '/xmlListarUsuarios' => XmlListarUsuarios::class,
];