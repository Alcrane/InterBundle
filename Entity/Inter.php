<?php

namespace ALC\InterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//-- Pour validator
use Symfony\Component\Validator\Constraints as Assert; 
//-- Unicité 
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Inter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ALC\InterBundle\Entity\InterRepository")
 * @UniqueEntity(fields="numInter", message="Cette inter existe déjà.")
 */
class Inter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="numinter", type="integer", unique=true)
     */
    private $numInter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dtouverture", type="date")
     * @Assert\DateTime()
     */
    private $dtOuverture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dtcloture", type="date", nullable=true)
     */
    private $dtCloture;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrjours", type="integer", nullable=true)
     */
    private $nbrjours;

    /**
     * @var string
     *
     * @ORM\Column(name="libinter", type="text")
     */
    private $libinter;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="attribinter", type="string", length=255)
     */
    private $attribInter;

    /**
     * @var integer
     *
     * @ORM\Column(name="cdetech", type="integer")
     */
    private $cdeTech = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="nomutil", type="string", length=255)
     */
    private $nomUtil;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomutil", type="string", length=255)
     */
    private $prenomUtil;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="encours", type="boolean")
     */
    private $encours = true;
    
    /*--------------------------------------
     * public function __construct ()
     * 
     */
    public function __construct () {
        $this->dtOuverture = new \Datetime();
        $this->dtCloture = new \Datetime();
        
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numInter
     *
     * @param integer $numInter
     *
     * @return Inter
     */
    public function setNumInter($numInter)
    {
        $this->numInter = $numInter;

        return $this;
    }

    /**
     * Get numInter
     *
     * @return integer
     */
    public function getNumInter()
    {
        return $this->numInter;
    }

    /**
     * Set dtOuverture
     *
     * @param \DateTime $dtOuverture
     *
     * @return Inter
     */
    public function setDtOuverture($dtOuverture)
    {
        $this->dtOuverture = $dtOuverture;

        return $this;
    }

    /**
     * Get dtOuverture
     *
     * @return \DateTime
     */
    public function getDtOuverture()
    {
        return $this->dtOuverture;
    }

    /**
     * Set dtCloture
     *
     * @param \DateTime $dtCloture
     *
     * @return Inter
     */
    public function setDtCloture($dtCloture)
    {
        $this->dtCloture = $dtCloture;

        return $this;
    }

    /**
     * Get dtCloture
     *
     * @return \DateTime
     */
    public function getDtCloture()
    {
        return $this->dtCloture;
    }

    /**
     * Set nbrjours
     *
     * @param integer $nbrjours
     *
     * @return Inter
     */
    public function setNbrjours($nbrjours)
    {
        $this->nbrjours = $nbrjours;

        return $this;
    }

    /**
     * Get nbrjours
     *
     * @return integer
     */
    public function getNbrjours()
    {
        return $this->nbrjours;
    }

    /**
     * Set libinter
     *
     * @param string $libinter
     *
     * @return Inter
     */
    public function setLibinter($libinter)
    {
        $this->libinter = $libinter;

        return $this;
    }

    /**
     * Get libinter
     *
     * @return string
     */
    public function getLibinter()
    {
        return $this->libinter;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Inter
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set attribInter
     *
     * @param string $attribInter
     *
     * @return Inter
     */
    public function setAttribInter($attribInter)
    {
        $this->attribInter = $attribInter;

        return $this;
    }

    /**
     * Get attribInter
     *
     * @return string
     */
    public function getAttribInter()
    {
        return $this->attribInter;
    }

    /**
     * Set cdeTech
     *
     * @param integer $cdeTech
     *
     * @return Inter
     */
    public function setCdeTech($cdeTech)
    {
        $this->cdeTech = $cdeTech;

        return $this;
    }

    /**
     * Get cdeTech
     *
     * @return integer
     */
    public function getCdeTech()
    {
        return $this->cdeTech;
    }

    /**
     * Set nomUtil
     *
     * @param string $nomUtil
     *
     * @return Inter
     */
    public function setNomUtil($nomUtil)
    {
        $this->nomUtil = $nomUtil;

        return $this;
    }

    /**
     * Get nomUtil
     *
     * @return string
     */
    public function getNomUtil()
    {
        return $this->nomUtil;
    }

    /**
     * Set prenomUtil
     *
     * @param string $prenomUtil
     *
     * @return Inter
     */
    public function setPrenomUtil($prenomUtil)
    {
        $this->prenomUtil = $prenomUtil;

        return $this;
    }

    /**
     * Get prenomUtil
     *
     * @return string
     */
    public function getPrenomUtil()
    {
        return $this->prenomUtil;
    }

    /**
     * Set encours
     *
     * @param boolean $encours
     *
     * @return Inter
     */
    public function setEncours($encours)
    {
        $this->encours = $encours;

        return $this;
    }

    /**
     * Get encours
     *
     * @return boolean
     */
    public function getEncours()
    {
        return $this->encours;
    }
}
