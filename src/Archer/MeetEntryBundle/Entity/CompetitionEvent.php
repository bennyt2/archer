<?php

namespace Archer\MeetEntryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompetitionEvent
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archer\MeetEntryBundle\Entity\CompetitionEventRepository")
 */
class CompetitionEvent
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
     * @ORM\Column(name="display_name", type="string", length=255)
     */
    private $display_name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Competition", inversedBy="competitionevents")
     * @ORM\JoinColumn(name="competition_id", referencedColumnName="id")
     */
    protected $competition;
    
    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="competitionevents")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    protected $event;

        /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="competitionevent")
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
     * Set display_name
     *
     * @param string $displayName
     * @return CompetitionEvent
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;
    
        return $this;
    }

    /**
     * Get display_name
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entries = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set competition
     *
     * @param \Archer\MeetEntryBundle\Entity\Competition $competition
     * @return CompetitionEvent
     */
    public function setCompetition(\Archer\MeetEntryBundle\Entity\Competition $competition = null)
    {
        $this->competition = $competition;
    
        return $this;
    }

    /**
     * Get competition
     *
     * @return \Archer\MeetEntryBundle\Entity\Competition 
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Set event
     *
     * @param \Archer\MeetEntryBundle\Entity\Event $event
     * @return CompetitionEvent
     */
    public function setEvent(\Archer\MeetEntryBundle\Entity\Event $event = null)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return \Archer\MeetEntryBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Add entries
     *
     * @param \Archer\MeetEntryBundle\Entity\Entry $entries
     * @return CompetitionEvent
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
}