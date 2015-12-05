<?php

namespace Galluet\JeuxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * Jeu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Galluet\JeuxBundle\Entity\JeuRepository")
 */
class Jeu
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
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Galluet\JeuxBundle\Entity\Editeur", inversedBy="jeux")
     */
    private $editeur;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     *
     */
    private $url;

    public function getWebPath() {
        return '/GalluetJeux/web/jeux/'.$this->url;

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
     * @return Jeu
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
     * Set url
     *
     * @param string $url
     *
     * @return Jeu
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set editeur
     *
     * @param \Galluet\JeuxBundle\Entity\Editeur $editeur
     *
     * @return Jeu
     */
    public function setEditeur(\Galluet\JeuxBundle\Entity\Editeur $editeur = null)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get editeur
     *
     * @return \Galluet\JeuxBundle\Entity\Editeur
     */
    public function getEditeur()
    {
        return $this->editeur;
    }
}
