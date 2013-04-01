<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 13:11
 */


namespace imobiliaria\models;

use tools\basemodels\AbstractBaseModel;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoNegocio
 *
 * @ORM\Table(name="tipo_negocio")
 * @ORM\Entity
 */
class TipoNegocio extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtipo_negocio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoNegocio;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_tipo_negocio", type="string", length=45, nullable=false)
     */
    private $descricaoTipoNegocio;

    /**
     * @param string $descricaoTipoNegocio
     */
    public function setDescricaoTipoNegocio($descricaoTipoNegocio)
    {
        $this->descricaoTipoNegocio = $descricaoTipoNegocio;
    }

    /**
     * @return string
     */
    public function getDescricaoTipoNegocio()
    {
        return $this->descricaoTipoNegocio;
    }


}
