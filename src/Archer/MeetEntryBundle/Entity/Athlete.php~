<?php

namespace Archer\MeetEntryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Athlete
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archer\MeetEntryBundle\Entity\AthleteRepository")
 */
class Athlete
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
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $first_name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $last_name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=true)
     */
    private $date_of_birth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="graduation_year", type="date", nullable=true)
     */
    private $graduation_year;

    /**
     * @var integer
     *
     * @ORM\Column(name="grade", type="integer", nullable=true)
     */
    private $grade;

    /**
     * @ORM\ManyToOne(targetEntity="Affiliation", inversedBy="athletes")
     * @ORM\JoinColumn(name="affiliation_id", referencedColumnName="id")
     */
    protected $affiliation;
    
    /**
     * @ORM\ManyToOne(targetEntity="Gender", inversedBy="athletes")
     * @ORM\JoinColumn(name="gender_id", referencedColumnName="id")
     */
    protected $gender;
    
    /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="athlete")
     */
    protected $entries;  
    
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
     * Set first_name
     *
     * @param string $firstName
     * @return Athlete
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Athlete
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set date_of_birth
     *
     * @param \DateTime $dateOfBirth
     * @return Athlete
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->date_of_birth = $dateOfBirth;
    
        return $this;
    }

    /**
     * Get date_of_birth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set graduation_year
     *
     * @param \DateTime $graduationYear
     * @return Athlete
     */
    public function setGraduationYear($graduationYear)
    {
        $this->graduation_year = $graduationYear;
    
        return $this;
    }

    /**
     * Get graduation_year
     *
     * @return \DateTime 
     */
    public function getGraduationYear()
    {
        return $this->graduation_year;
    }

    /**
     * Set grade
     *
     * @param integer $grade
     * @return Athlete
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    
        return $this;
    }

    /**
     * Get grade
     *
     * @return integer 
     */
    public function getGrade()
    {
        return $this->grade;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entries = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set affiliation
     *
     * @param \Archer\MeetEntryBundle\Entity\Affiliation $affiliation
     * @return Athlete
     */
    public function setAffiliation(\Archer\MeetEntryBundle\Entity\Affiliation $affiliation = null)
    {
        $this->affiliation = $affiliation;
    
        return $this;
    }

    /**
     * Get affiliation
     *
     * @return \Archer\MeetEntryBundle\Entity\Affiliation 
     */
    public function getAffiliation()
    {
        return $this->affiliation;
    }

    /**
     * Add entries
     *
     * @param \Archer\MeetEntryBundle\Entity\Entry $entries
     * @return Athlete
     */
    public function addEntrie(\Archer\MeetEntryBundle\Entity\Entry $entries)
    {
        $this->entries[] = $entries;
    
        return $this;
    }

    /**
     * Remove entries
     *
     * @param \Archer\MeetEntryBundle\Entity\Entry $entries
     */
    public function removeEntrie(\Archer\MeetEntryBundle\Entity\Entry $entries)
    {
        $this->entries->removeElement($entries);
    }

    /**
     * Get entries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * Set gender
     *
     * @param \Archer\MeetEntryBundle\Entity\Gender $gender
     * @return Athlete
     */
    public function setGender(\Archer\MeetEntryBundle\Entity\Gender $gender = null)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return \Archer\MeetEntryBundle\Entity\Gender 
     */
    public function getGender()
    {
        return $this->gender;
    }
}