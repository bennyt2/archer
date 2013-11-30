<?php

namespace Archer\MeetEntryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entry
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archer\MeetEntryBundle\Entity\EntryRepository")
 */
class Entry
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
     * @ORM\Column(name="raw_seed", type="string", length=255)
     */
    private $raw_seed;

    /**
     * @var integer
     *
     * @ORM\Column(name="seed_time_seconds", type="integer")
     */
    private $seed_time_seconds;

    /**
     * @var integer
     *
     * @ORM\Column(name="seed_mark_centimeters", type="integer")
     */
    private $seed_mark_centimeters;
    
    /**
     * @ORM\ManyToOne(targetEntity="Athlete", inversedBy="entries")
     * @ORM\JoinColumn(name="athlete_id", referencedColumnName="id")
     */
    protected $athlete;
    
    /**
     * @ORM\ManyToOne(targetEntity="CompetitionEvent", inversedBy="entries")
     * @ORM\JoinColumn(name="competitionevent_id", referencedColumnName="id")
     */
    protected $competitionevent;


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
     * Set raw_seed
     *
     * @param string $rawSeed
     * @return Entry
     */
    public function setRawSeed($rawSeed)
    {
        $this->raw_seed = $rawSeed;
    
        return $this;
    }

    /**
     * Get raw_seed
     *
     * @return string 
     */
    public function getRawSeed()
    {
        return $this->raw_seed;
    }

    /**
     * Set seed_time_seconds
     *
     * @param integer $seedTimeSeconds
     * @return Entry
     */
    public function setSeedTimeSeconds($seedTimeSeconds)
    {
        $this->seed_time_seconds = $seedTimeSeconds;
    
        return $this;
    }

    /**
     * Get seed_time_seconds
     *
     * @return integer 
     */
    public function getSeedTimeSeconds()
    {
        return $this->seed_time_seconds;
    }

    /**
     * Set seed_mark_centimeters
     *
     * @param integer $seedMarkCentimeters
     * @return Entry
     */
    public function setSeedMarkCentimeters($seedMarkCentimeters)
    {
        $this->seed_mark_centimeters = $seedMarkCentimeters;
    
        return $this;
    }

    /**
     * Get seed_mark_centimeters
     *
     * @return integer 
     */
    public function getSeedMarkCentimeters()
    {
        return $this->seed_mark_centimeters;
    }

    /**
     * Set athlete
     *
     * @param \Archer\MeetEntryBundle\Entity\Athlete $athlete
     * @return Entry
     */
    public function setAthlete(\Archer\MeetEntryBundle\Entity\Athlete $athlete = null)
    {
        $this->athlete = $athlete;
    
        return $this;
    }

    /**
     * Get athlete
     *
     * @return \Archer\MeetEntryBundle\Entity\Athlete 
     */
    public function getAthlete()
    {
        return $this->athlete;
    }

    /**
     * Set competitionevent
     *
     * @param \Archer\MeetEntryBundle\Entity\CompetitionEvent $competitionevent
     * @return Entry
     */
    public function setCompetitionevent(\Archer\MeetEntryBundle\Entity\CompetitionEvent $competitionevent = null)
    {
        $this->competitionevent = $competitionevent;
    
        return $this;
    }

    /**
     * Get competitionevent
     *
     * @return \Archer\MeetEntryBundle\Entity\CompetitionEvent 
     */
    public function getCompetitionevent()
    {
        return $this->competitionevent;
    }
}