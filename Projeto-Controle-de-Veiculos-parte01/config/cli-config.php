<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerCreator = new \Projeto\Pratico\infra\EntityManagerCreator();
$entityManager = $entityManagerCreator->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);