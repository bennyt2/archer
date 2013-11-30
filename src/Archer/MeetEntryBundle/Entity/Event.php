<?php

namespace Archer\MeetEntryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archer\MeetEntryBundle\Entity\EventRepository")
 */
class Event
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
     * @ORM\ManyToOne(targetEntity="EventType")
     **/
    private $event_type; 

    /**
     * @ORM\OneToMany(targetEntity="CompetitionEvent", mappedBy="event")
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
     * @return Event
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
     * Set event_type
     *
     * @param \Archer\MeetEntryBundle\Entity\EventType $eventType
     * @return Event
     */
    public function setEventType(\Archer\MeetEntryBundle\Entity\EventType $eventType = null)
    {
        $this->event_type = $eventType;
    
        return $this;
    }

    /**
     * Get event_type
     *
     * @return \Archer\MeetEntryBundle\Entity\EventType 
     */
    public function getEventType()
    {
        return $this->event_type;
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
     * @return Event
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