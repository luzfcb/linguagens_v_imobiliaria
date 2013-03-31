<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 13:11
 */


namespace imobiliaria\models;

use tools\basemodels;
use Doctrine\ORM\Mapping as ORM;


/**
 * Imagem
 *
 * @ORM\Table(name="imagem")
 * @ORM\Entity
 */
class Imagem extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idimagem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idimagem;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=200, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=200, nullable=false)
     */
    private $url;

    /**
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }


}
