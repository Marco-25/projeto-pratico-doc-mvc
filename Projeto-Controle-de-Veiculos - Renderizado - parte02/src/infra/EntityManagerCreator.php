<?php


namespace Projeto\Pratico\infra;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $path = [__DIR__.'/../model'];
        $isDevMode = false;

        $dbParams = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__.'/../../data/banco.sqlite'
        );

        $config = Setup::createAnnotationMetadataConfiguration(
            $path,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}