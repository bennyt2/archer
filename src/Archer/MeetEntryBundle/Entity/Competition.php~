<?php

namespace Archer\MeetEntryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competition
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archer\MeetEntryBundle\Entity\CompetitionRepository")
 */
class Competition
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
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $start_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $end_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_start_date", type="datetime")
     */
    private $registration_start_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_end_date", type="datetime")
     */
    private $registration_end_date;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_code", type="string", length=255)
     */
    private $registration_code;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text")
     */
    private $notes;

    /**
     * @var integer
     *
     * @ORM\Column(name="events_per_athlete", type="integer")
     */
    private $events_per_athlete;

    /**
     * @var integer
     *
     * @ORM\Column(name="male_entries_allowed", type="integer")
     */
    private $male_entries_allowed;

    /**
     * @var integer
     *
     * @ORM\Column(name="female_entries_allowed", type="integer")
     */
    private $female_entries_allowed;

    /**
     * @var integer
     *
     * @ORM\Column(name="athletes_per_event", type="integer")
     */
    private $athletes_per_event;

    /**
     * @var integer
     *
     * @ORM\Column(name="relays_per_event", type="integer")
     */
    private $relays_per_event;

    /**
     * @ORM\ManyToOne(targetEntity="CompetitionType")
     **/
    private $competition_type; 

    /**
     * @ORM\OneToMany(targetEntity="CompetitionEvent", mappedBy="competition")
     */
    protected $competitionevents;  

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
     * @return Competition
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
     * Set location
     *
     * @param string $location
     * @return Competition
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return Competition
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;
    
        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return Competition
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;
    
        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set registration_start_date
     *
     * @param \DateTime $registrationStartDate
     * @return Competition
     */
    public function setRegistrationStartDate($registrationStartDate)
    {
        $this->registration_start_date = $registrationStartDate;
    
        return $this;
    }

    /**
     * Get registration_start_date
     *
     * @return \DateTime 
     */
    public function getRegistrationStartDate()
    {
        return $this->registration_start_date;
    }

    /**
     * Set registration_end_date
     *
     * @param \DateTime $registrationEndDate
     * @return Competition
     */
    public function setRegistrationEndDate($registrationEndDate)
    {
        $this->registration_end_date = $registrationEndDate;
    
        return $this;
    }

    /**
     * Get registration_end_date
     *
     * @return \DateTime 
     */
    public function getRegistrationEndDate()
    {
        return $this->registration_end_date;
    }

    /**
     * Set registration_code
     *
     * @param string $registrationCode
     * @return Competition
     */
    public function setRegistrationCode($registrationCode)
    {
        $this->registration_code = $registrationCode;
    
        return $this;
    }

    /**
     * Get registration_code
     *
     * @return string 
     */
    public function getRegistrationCode()
    {
        return $this->registration_code;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Competition
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    
        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set events_per_athlete
     *
     * @param integer $eventsPerAthlete
     * @return Competition
     */
    public function setEventsPerAthlete($eventsPerAthlete)
    {
        $this->events_per_athlete = $eventsPerAthlete;
    
        return $this;
    }

    /**
     * Get events_per_athlete
     *
     * @return integer 
     */
    public function getEventsPerAthlete()
    {
        return $this->events_per_athlete;
    }

    /**
     * Set male_entries_allowed
     *
     * @param integer $maleEntriesAllowed
     * @return Competition
     */
    public function setMaleEntriesAllowed($maleEntriesAllowed)
    {
        $this->male_entries_allowed = $maleEntriesAllowed;
    
        return $this;
    }

    /**
     * Get male_entries_allowed
     *
     * @return integer 
     */
    public function getMaleEntriesAllowed()
    {
        return $this->male_entries_allowed;
    }

    /**
     * Set female_entries_allowed
     *
     * @param integer $femaleEntriesAllowed
     * @return Competition
     */
    public function setFemaleEntriesAllowed($femaleEntriesAllowed)
    {
        $this->female_entries_allowed = $femaleEntriesAllowed;
    
        return $this;
    }

    /**
     * Get female_entries_allowed
     *
     * @return integer 
     */
    public function getFemaleEntriesAllowed()
    {
        return $this->female_entries_allowed;
    }

    /**
     * Set athletes_per_event
     *
     * @param integer $athletesPerEvent
     * @return Competition
     */
    public function setAthletesPerEvent($athletesPerEvent)
    {
        $this->athletes_per_event = $athletesPerEvent;
    
        return $this;
    }

    /**
     * Get athletes_per_event
     *
     * @return integer 
     */
    public function getAthletesPerEvent()
    {
        return $this->athletes_per_event;
    }

    /**
     * Set relays_per_event
     *
     * @param integer $relaysPerEvent
     * @return Competition
     */
    public function setRelaysPerEvent($relaysPerEvent)
    {
        $this->relays_per_event = $relaysPerEvent;
    
        return $this;
    }

    /**
     * Get relays_per_event
     *
     * @return integer 
     */
    public function getRelaysPerEvent()
    {
        return $this->relays_per_event;
    }

    /**
     * Set competition_type
     *
     * @param \Archer\MeetEntryBundle\Entity\CompetitionType $competitionType
     * @return Competition
     */
    public function setCompetitionType(\Archer\MeetEntryBundle\Entity\CompetitionType $competitionType = null)
    {
        $this->competition_type = $competitionType;
    
        return $this;
    }

    /**
     * Get competition_type
     *
     * @return \Archer\MeetEntryBundle\Entity\CompetitionType 
     */
    public function getCompetitionType()
    {
        return $this->competition_type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competitionevents = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add competitionevents
     *
     * @param \Archer\MeetEntryBundle\Entity\CompetitionEvent $competitionevents
     * @return Competition
     */
    public function addCompetitionevent(\Archer\MeetEntryBundle\Entity\CompetitionEvent $competitionevents)
    {
        $this->competitionevents[] = $competitionevents;
    
        return $this;
    }

    /**
     * Remove competitionevents
     *
     * @param \Archer\MeetEntryBundle\Entity\CompetitionEvent $competitionevents
     */
    public function removeCompetitionevent(\Archer\MeetEntryBundle\Entity\CompetitionEvent $competitionevents)
    {
        $this->competitionevents->removeElement($competitionevents);
    }

    /**
     * Get competitionevents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetitionevents()
    {
        return $this->competitionevents;
    }
}