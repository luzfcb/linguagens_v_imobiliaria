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
 * Imovel
 *
 * @ORM\Table(name="imovel")
 * @ORM\Entity
 */
class Imovel extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idimoveis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idimoveis;

    /**
     * @var integer
     *
     * @ORM\Column(name="valor", type="integer", nullable=false)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=1000, nullable=false)
     */
    private $descricao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proprietario", inversedBy="imovelimoveis")
     * @ORM\JoinTable(name="imovel_possui_proprietario",
     *   joinColumns={
     *     @ORM\JoinColumn(name="imovel_idimoveis", referencedColumnName="idimoveis")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="proprietario_idproprietario", referencedColumnName="idproprietario")
     *   }
     * )
     */
    private $proprietarioproprietario;

    /**
     * @var \Imagem
     *
     * @ORM\ManyToOne(targetEntity="Imagem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imagem_idimagem", referencedColumnName="idimagem")
     * })
     */
    private $imagemimagem;

    /**
     * @var \Endereco
     *
     * @ORM\ManyToOne(targetEntity="Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_idendereco", referencedColumnName="idendereco")
     * })
     */
    private $enderecoendereco;

    /**
     * @var \TipoImovel
     *
     * @ORM\ManyToOne(targetEntity="TipoImovel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_imovel_idtipo_imovel", referencedColumnName="idtipo_imovel")
     * })
     */
    private $tipoImoveltipoImovel;

    /**
     * @var \TipoNegocio
     *
     * @ORM\ManyToOne(targetEntity="TipoNegocio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_negocio_idtipo_negocio", referencedColumnName="idtipo_negocio")
     * })
     */
    private $tipoNegociotipoNegocio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proprietarioproprietario = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \Endereco $enderecoendereco
     */
    public function setEnderecoendereco($enderecoendereco)
    {
        $this->enderecoendereco = $enderecoendereco;
    }

    /**
     * @return \Endereco
     */
    public function getEnderecoendereco()
    {
        return $this->enderecoendereco;
    }

    /**
     * @param \Imagem $imagemimagem
     */
    public function setImagemimagem($imagemimagem)
    {
        $this->imagemimagem = $imagemimagem;
    }

    /**
     * @return \Imagem
     */
    public function getImagemimagem()
    {
        return $this->imagemimagem;
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

    /**
     * @param \TipoImovel $tipoImoveltipoImovel
     */
    public function setTipoImoveltipoImovel($tipoImoveltipoImovel)
    {
        $this->tipoImoveltipoImovel = $tipoImoveltipoImovel;
    }

    /**
     * @return \TipoImovel
     */
    public function getTipoImoveltipoImovel()
    {
        return $this->tipoImoveltipoImovel;
    }

    /**
     * @param \TipoNegocio $tipoNegociotipoNegocio
     */
    public function setTipoNegociotipoNegocio($tipoNegociotipoNegocio)
    {
        $this->tipoNegociotipoNegocio = $tipoNegociotipoNegocio;
    }

    /**
     * @return \TipoNegocio
     */
    public function getTipoNegociotipoNegocio()
    {
        return $this->tipoNegociotipoNegocio;
    }

    /**
     * @param int $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return int
     */
    public function getValor()
    {
        return $this->valor;
    }
    
}
