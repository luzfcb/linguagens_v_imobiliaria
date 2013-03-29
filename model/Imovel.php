<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 11:19
 */


class Contato{
    private $id;
    private $numero;
    private $prefixo;
    private $emails;

    function __construct($emails, $numero, $prefixo)
    {
        $this->emails = $emails;
        $this->numero = $numero;
        $this->prefixo = $prefixo;
    }

}

class Proprietario{
    private $id;
    private $nome;
    private $contato_id;

    function __construct($contato_id, $nome)
    {
        $this->contato_id = $contato_id;
        $this->nome = $nome;
    }


}

class Endereco{
    private $id;
    private $descricao;
    private $cep;

}

$tipo_negocio = array(1 => 'Locacao', 2=> 'Venda');
$tipo_imovel = array(1 => 'Casa', 2=> 'Kitnet',  3=> 'Sala Comercial', 4=> 'Apartamento');


class Imagem{

    private $id;

}

class Imovel {
    private $id;
    private $proprietario_id;
    private $tipo_imovel_id;//array
    private $valor;
    private $tipo_negocio_id; //array
    private $endereco_id;
    private $descricao;
    private $imagens;//array


}