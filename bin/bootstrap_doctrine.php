<?php
// bootstrap_doctrine.php

// See :doc:`Configuration <../reference/configuration>` for up to date autoloading details.
use Doctrine\ORM\Tools\Setup;

require_once "Doctrine/ORM/Tools/Setup.php";
Setup::registerAutoloadPEAR();

// Create a simple "default" Doctrine ORM configuration for XML Mapping
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src/smith981/silex-skeleton/entities"), $isDevMode);

/**
 * database configuration parameters for Doctrine console
 */
$conn = array(
    'driver' => 'pdo_mysql',
    'dbname' => 'test',
    'user' => 'testuser',
    'password' => 'secret',
    'host' => 'localhost',
);

// obtaining the entity manager
$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);