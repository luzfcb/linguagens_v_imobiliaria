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
 * Estado
 *
 * @ORM\Table(name="estado")
 * @ORM\Entity
 */
class Estado extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idestados", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idestados;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_estado", type="string", length=45, nullable=false)
     */
    private $nomeEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=2, nullable=false)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="capital", type="string", length=45, nullable=false)
     */
    private $capital;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Endereco", inversedBy="estadosestados")
     * @ORM\JoinTable(name="estado_possui_endereco",
     *   joinColumns={
     *     @ORM\JoinColumn(name="estados_idestados", referencedColumnName="idestados")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="endereco_idendereco", referencedColumnName="idendereco")
     *   }
     * )
     */
    private $enderecoendereco;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enderecoendereco = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param string $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $enderecoendereco
     */
    public function setEnderecoendereco($enderecoendereco)
    {
        $this->enderecoendereco = $enderecoendereco;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnderecoendereco()
    {
        return $this->enderecoendereco;
    }

    /**
     * @param string $nomeEstado
     */
    public function setNomeEstado($nomeEstado)
    {
        $this->nomeEstado = $nomeEstado;
    }

    /**
     * @return string
     */
    public function getNomeEstado()
    {
        return $this->nomeEstado;
    }

    /**
     * @param string $sigla
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }

    /**
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }
    
}
