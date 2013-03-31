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
 * Endereco
 *
 * @ORM\Table(name="endereco")
 * @ORM\Entity
 */
class Endereco extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idendereco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idendereco;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=false)
     */
    private $descricao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Estado", mappedBy="enderecoendereco")
     */
    private $estadosestados;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estadosestados = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @param \Doctrine\Common\Collections\Collection $estadosestados
     */
    public function setEstadosestados($estadosestados)
    {
        $this->estadosestados = $estadosestados;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstadosestados()
    {
        return $this->estadosestados;
    }
    
}
