<?php

//-- Inter/src/ALC/InterBundle/Entity/Site.php

namespace ALC\InterBundle\Entity;



use Doctrine\ORM\Mapping as ORM;

//-- Validation des données
use Symfony\Component\Validator\Constraints as Assert;
//-- Unicité du site
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Site
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ALC\InterBundle\Entity\SiteRepository")
 * @UniqueEntity(fields="adresse", message="Ce site existe déjà.")
 */
class Site
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
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $adresse;


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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Site
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
}

