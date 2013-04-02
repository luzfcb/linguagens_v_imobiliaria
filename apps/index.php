<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 01/04/13
 * Horario: 21:40
 */




use Imobiliaria\Models\TipoImovel;
use tools\Twig_tool\TwigViewBase;

$GLOBALS['APP_PATH'] = __DIR__;


$tipo_imovel = new TipoImovel();
$tipo_imovel->setDescricaoTipoImovel('Cobertura cara');



$view = new TwigViewBase(null, $use_cache = false);

$view->render_by_parans('index.twig', $tipo_imovel->to_array_recursively());
