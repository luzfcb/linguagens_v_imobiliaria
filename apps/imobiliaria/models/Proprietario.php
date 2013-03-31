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
 * Proprietario
 *
 * @ORM\Table(name="proprietario")
 * @ORM\Entity
 */
class Proprietario extends AbstractBaseModel{
    /**
     * @var integer
     *
     * @ORM\Column(name="idproprietario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproprietario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Imovel", mappedBy="proprietarioproprietario")
     */
    private $imovelimoveis;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Contato", inversedBy="proprietarioproprietario")
     * @ORM\JoinTable(name="proprietario_possui_contato",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proprietario_idproprietario", referencedColumnName="idproprietario")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contato_idcontato", referencedColumnName="idcontato")
     *   }
     * )
     */
    private $contatocontato;

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
     * Constructor
     */
    public function __construct()
    {
        $this->imovelimoveis = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contatocontato = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $contatocontato
     */
    public function setContatocontato($contatocontato)
    {
        $this->contatocontato = $contatocontato;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContatocontato()
    {
        return $this->contatocontato;
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
     * @param \Doctrine\Common\Collections\Collection $imovelimoveis
     */
    public function setImovelimoveis($imovelimoveis)
    {
        $this->imovelimoveis = $imovelimoveis;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImovelimoveis()
    {
        return $this->imovelimoveis;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }
    
}
