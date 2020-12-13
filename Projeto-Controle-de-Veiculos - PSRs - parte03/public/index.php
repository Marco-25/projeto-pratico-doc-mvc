<?php

require __DIR__. '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;

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

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$classController = $rotas[$url];
/** @var ContainerInterface $containerBuild */
$containerBuild = require __DIR__ . '/../config/dependencias.php';
/** @var Psr\Http\Server\RequestHandlerInterface $controller */
$controller = $containerBuild->get($classController);
$resposta = $controller->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
     foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
         }
 }

echo $resposta->getBody();















