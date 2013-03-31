<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 11:19
 */

namespace velhos;
use ReflectionClass;
use ReflectionProperty;

interface InterfaceBaseModel2{

    public function to_array_recursively();
    public function save();
    public function objects();
    public function create_table();

}


abstract class AbstractBaseModel2 implements InterfaceBaseModel2{

    private $tabela_nome;
    private $colunas_nome;

    private function a(){
        get_class($this);
        

    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function objects()
    {
        // TODO: Implement objects() method.
    }

    public function create_table()
    {
        // TODO: Implement create_table() method.
    }


    public function to_array_recursively(){
        $reflect = new ReflectionClass($this);

        $props_array   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC |
                                           ReflectionProperty::IS_PROTECTED|
                                           ReflectionProperty::IS_PRIVATE);

        $retorno =  array();

        foreach($props_array as $prop){
           $prop->setAccessible(true);
           //echo $prop->getName() . 'parente class_name_is: ' . get_parent_class($prop->getValue($this)) . '</br></br>' ;
           $valor_atual = $prop->getValue($this);
            if($this instanceof InterfaceBaseModel){

                $valor_atual = $valor_atual->to_array_recursively();
            }

/*           if(get_parent_class($valor_atual) == "AbstractBaseModel"){

               $valor_atual = $valor_atual->to_array_recursively();
           }*/
           $retorno[ $prop->getName()] =  $valor_atual;
        }

        return $retorno;
    }

    public function __to_array(){
        $reflect = new ReflectionClass($this);

        $props_array   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC |
            ReflectionProperty::IS_PROTECTED|
            ReflectionProperty::IS_PRIVATE);

        $retorno =  array();

        foreach($props_array as $prop){
            $prop->setAccessible(true);
            //echo $prop->getName() . 'parente class_name_is: ' . get_parent_class($prop->getValue($this)) . '</br></br>' ;
            $valor_atual = $prop->getValue($this);
            if(get_parent_class($valor_atual) == "AbstractBaseModel"){

                $retorno = array_merge($retorno, $valor_atual->to_array());

            }
            else{
                $retorno[ $prop->getName()] =  $valor_atual;
            }

        }

        return $retorno;
    }


}


/**
 * Class Contato
 * @entidade: Contato
 * @tabela: contato
 */
class Contato extends AbstractBaseModel{

    /**
     * @coluna: id
     * @tipo: autoincrement
     */
    public  $id;
    private $numero;
    private $prefixo;
    private $emails;

    function __construct($emails, $numero, $prefixo)
    {
        $this->emails = array('bnafta@gmail.com', 'tiago@gmail.com');
        $this->numero = $numero;
        $this->prefixo = $prefixo;
    }



}





class Proprietario extends AbstractBaseModel{
    private $id;
    private $nome;
    private $contato_id;

    function __construct($contato_id, $nome)
    {
        $this->contato_id = $contato_id;
        $this->nome = $nome;
    }


}

class Endereco extends AbstractBaseModel{
    private $id;
    private $descricao;
    private $cep;

    function __construct($cep, $descricao)
    {
        $this->cep = $cep;
        $this->descricao = $descricao;
    }

}

$tipo_negocio = array(1 => 'Locacao', 2=> 'Venda');
$tipo_imovel = array(1 => 'Casa', 2=> 'Kitnet',  3=> 'Sala Comercial', 4=> 'Apartamento');


class Imagem extends AbstractBaseModel{

    private $id;
    private $url;

    function __construct($url)
    {
        $this->url = $url;
    }

}

class Imovel  extends AbstractBaseModel{
    private $id;
    private $proprietario_id;
    private $tipo_imovel_id;//array
    private $valor;
    private $tipo_negocio_id; //array
    private $endereco_id;
    private $descricao;
    private $imagens;

    function __construct($descricao, $endereco_id, $proprietario_id, $tipo_imovel_id, $tipo_negocio_id, $valor)
    {
        $this->descricao = $descricao;
        $this->endereco_id = $endereco_id;


        $this->proprietario_id = $proprietario_id;
        $this->tipo_imovel_id = $tipo_imovel_id;
        $this->tipo_negocio_id = $tipo_negocio_id;
        $this->valor = $valor;
    }
    //array


}