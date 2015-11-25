<?php

namespace ALC\InterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

//-- Validation des données
use Symfony\Component\Validator\Constraints as Assert;
//-- Unicité du site
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Typeinter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ALC\InterBundle\Entity\TypeinterRepository")
 * @UniqueEntity(fields="libtyp", message="Ce type d'intervention existe déjà.")
 */
class Typeinter
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
     * @ORM\Column(name="libtyp", type="string", length=255)
     */
    private $libtyp;


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
     * Set libtyp
     *
     * @param string $libtyp
     *
     * @return Typeinter
     */
    public function setlibtyp($libtyp)
    {
        $this->libtyp = $libtyp;

        return $this;
    }

    /**
     * Get libtyp
     *
     * @return string
     */
    public function getlibtyp()
    {
        return $this->libtyp;
    }
}

