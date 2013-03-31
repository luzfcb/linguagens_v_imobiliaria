<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 31/03/13
 * Horario: 18:58
 */

namespace tools\basemodels;
use ReflectionClass;
use ReflectionProperty;


interface InterfaceBaseModel{

    public function to_array_recursively();

}


abstract class AbstractBaseModel implements InterfaceBaseModel{

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
