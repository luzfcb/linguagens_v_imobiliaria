<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 13:12
 */


//Twig_Autoloader::register();
// set autoload
//spl_autoload_register(function ($class) {
//    require_once(str_replace('\\', '/', $class . '.php'));
//});
require_once $GLOBALS['ROOT_PROJECT_PATH'] . '/vendor/autoload.php';

$GLOBALS['APP_PATH'] = __DIR__;

//use models\Contato;
//use models\Endereco;
//use models\Estado;
//use models\Imagem;
//use models\Imovel;
//use models\Proprietario;
//use models\TipoImovel;
//use models\TipoNegocio;


//$loader = new Twig_Loader_Filesystem('./templates');
//$twig = new Twig_Environment($loader, array(
//    'cache' => './tmp/cache',
//));

//$template = $twig->loadTemplate('hello.twig');
$params = array(
    'name' => 'Krzysztof',
    'friends' => array(
        array(
            'firstname' => 'John',
            'lastname' => 'Smith'
        ),
        array(
            'firstname' => 'Britney',
            'lastname' => 'Spears'
        ),
        array(
            'firstname' => 'Brad',
            'lastname' => 'Pitt'
        )
    )
);
//$template->display($params);

function getClassAnnotations($class)
{
    $r = new ReflectionClass($class);
    $doc = $r->getDocComment();
    print_r($doc);
    preg_match_all('#@(.*?)\n#s', $doc, $annotations);
    return $annotations[1];
}




require_once('models/TipoImovel.php');

$tipo_imovel = new imobiliaria\models\TipoImovel();
$tipo_imovel->setDescricaoTipoImovel('Cobertura cara');


//
//$contato = new Contato('bnafta@gmail.com', '6392041028', '63');
//
//getClassAnnotations($contato);
//$aa = $contato->to_array_recursively();
//
//
//$proprietario = new Proprietario($contato, 'Jose da Silva');
//
//
//$imovel = new Imovel('Casa grande com varanda',
//    new Endereco('77006667', 'Quadra 404 Norte Al 10 N 30'),
//    $proprietario,
//    $tipo_imovel[1],
//    $tipo_negocio[1],
//    680
//);


$porcaria_de_namespace = $GLOBALS['ROOT_PROJECT_PATH'] . '/apps/tools/twig_obtect_to_template.php';
require_once($porcaria_de_namespace);

$view = new TwigViewBase(null, $use_cache = false);

$view->render_by_parans('index.twig', $tipo_imovel->to_array_recursively());
/*
$view->name = 'Krzysztof';
$view->friends = array(
    array(
        'firstname' => 'John',
        'lastname' => 'Smith'
    ),
    array(
        'firstname' => 'Britney',
        'lastname' => 'Spears'
    ),
    array(
        'firstname' => 'Brad',
        'lastname' => 'Pitt'
    )
);
$view->vaca = 'Muuuuu';

//$view->render('hello.twig', $params);
*/

