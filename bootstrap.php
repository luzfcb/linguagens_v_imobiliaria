<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 31/03/13
 * Horario: 18:01
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";



// Set Entity Manager parameters
//$paths = array("entities");
$paths = array("/home/oficina/PhpstormProjects/linguagens3_novo/apps/imobiliaria/models");

$isDevMode = false;
//$dbParams = array(
  //'driver'   => 'pdo_mysql',
  //'user'     => 'root',
  //'password' => '123123',
  //'dbname'   => 'imobiliaria',
//);

$dbParams = array(
    'driver' => 'pdo_sqlite',
    'path' => 'database.sqlite',
);



// Set up an Entity Manager
// ACHTUNG: The following line is different from the
//          tutorial!
//$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$entityManager     = EntityManager::create($dbParams, $config);
