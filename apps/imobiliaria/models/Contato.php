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
 * Contato
 *
 * @ORM\Table(name="contato")
 * @ORM\Entity
 */
class Contato
extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcontato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=45, nullable=true)
     */
    private $numero;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proprietario", mappedBy="contatocontato")
     */
    private $proprietarioproprietario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proprietarioproprietario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param string $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $proprietarioproprietario
     */
    public function setProprietarioproprietario($proprietarioproprietario)
    {
        $this->proprietarioproprietario = $proprietarioproprietario;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProprietarioproprietario()
    {
        return $this->proprietarioproprietario;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    
}
