<?php

require __DIR__. '/../vendor/autoload.php';

use Projeto\Pratico\controller\InterfaceControleDeRequisicao;

$url = $_SERVER['PATH_INFO'];
$rotas = require __DIR__. '/../config/routes.php';

if (!array_key_exists($url,$rotas)) {
    http_response_code(404);
    exit();
}

session_start();
$rotaDeLogin = stripos($url,'login');
if (!isset($_SESSION['logado']) && $rotaDeLogin === false) {
    header('Location: /login');
    exit();
}

$classController = $rotas[$url];
/** @var InterfaceControleDeRequisicao $controller */
$controller = new $classController();
$controller->requisicao();