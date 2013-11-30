<?php

namespace Archer\MeetEntryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gender
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archer\MeetEntryBundle\Entity\GenderRepository")
 */
class Gender
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="abbreviation", type="string", length=255)
     */
    private $abbreviation;

    /**
     * @ORM\OneToMany(targetEntity="Athlete", mappedBy="gender")
     */
    protected $athletes;  

    public function __toString()
    {
        return $this->getName();
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
     * Set name
     *
     * @param string $name
     * @return Gender
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set abbreviation
     *
     * @param string $abbreviation
     * @return Gender
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;
    
        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return string 
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->athletes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add athletes
     *
     * @param \Archer\MeetEntryBundle\Entity\Athlete $athletes
     * @return Gender
     */
    public function addAthlete(\Archer\MeetEntryBundle\Entity\Athlete $athletes)
    {
        $this->athletes[] = $athletes;
    
        return $this;
    }

    /**
     * Remove athletes
     *
     * @param \Archer\MeetEntryBundle\Entity\Athlete $athletes
     */
    public function removeAthlete(\Archer\MeetEntryBundle\Entity\Athlete $athletes)
    {
        $this->athletes->removeElement($athletes);
    }

    /**
     * Get athletes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAthletes()
    {
        return $this->athletes;
    }
}