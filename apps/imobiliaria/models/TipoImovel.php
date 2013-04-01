<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 13:11
 */


namespace imobiliaria\models;
$porcaria_de_namespace = $GLOBALS['ROOT_PROJECT_PATH']. '/apps/tools/basemodels.php';
require_once($porcaria_de_namespace );

use tools\basemodels\AbstractBaseModel;
use Doctrine\ORM\Mapping as ORM;


/**
 * TipoImovel
 *
 * @ORM\Table(name="tipo_imovel")
 * @ORM\Entity
 */
class TipoImovel extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtipo_imovel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoImovel;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_tipo_imovel", type="string", length=45, nullable=false)
     */
    private $descricaoTipoImovel;

    /**
     * @param string $descricaoTipoImovel
     */
    public function setDescricaoTipoImovel($descricaoTipoImovel)
    {
        $this->descricaoTipoImovel = $descricaoTipoImovel;
    }

    /**
     * @return string
     */
    public function getDescricaoTipoImovel()
    {
        return $this->descricaoTipoImovel;
    }


}
