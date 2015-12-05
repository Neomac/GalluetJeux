<?php

namespace Galluet\JeuxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editeur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Galluet\JeuxBundle\Entity\EditeurRepository")
 */
class Editeur
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Galluet\JeuxBundle\Entity\Jeu", mappedBy="editeur")
     */
    private $jeux;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jeux = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Editeur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add jeux
     *
     * @param \Galluet\JeuxBundle\Entity\Jeu $jeux
     *
     * @return Editeur
     */
    public function addJeux(\Galluet\JeuxBundle\Entity\Jeu $jeux)
    {
        $this->jeux[] = $jeux;

        return $this;
    }

    /**
     * Remove jeux
     *
     * @param \Galluet\JeuxBundle\Entity\Jeu $jeux
     */
    public function removeJeux(\Galluet\JeuxBundle\Entity\Jeu $jeux)
    {
        $this->jeux->removeElement($jeux);
    }

    /**
     * Get jeux
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJeux()
    {
        return $this->jeux;
    }
}
