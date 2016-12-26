<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="football_match")
 */
class FootballMatch
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tournament")
     * @ORM\JoinColumn(name="tournament_id", referencedColumnName="id")
     */
    private $tournament;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Club")
     * @ORM\JoinColumn(name="club_home_id", referencedColumnName="id")
     */
    private $clubHome;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Club")
     * @ORM\JoinColumn(name="club_away_id", referencedColumnName="id")
     */
    private $clubAway;

    /**
     * @ORM\Column(type="integer", name="points_home")
     */
    private $pointsHome;

    /**
     * @ORM\Column(type="integer", name="points_away")
     */
    private $pointsAway;

    /**
     * @ORM\Column(type="date", name="date_of_match")
     */
    private $dateOfMatch;

    /**
     * @ORM\Column(type="boolean", name="is_played")
     */
    private $isPlayed;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
     * @return mixed
     */
    public function getPointsHome()
    {
        return $this->pointsHome;
    }

    /**
     * @param mixed $pointsHome
     */
    public function setPointsHome($pointsHome)
    {
        $this->pointsHome = $pointsHome;
    }

    /**
     * @return mixed
     */
    public function getPointsAway()
    {
        return $this->pointsAway;
    }

    /**
     * @param mixed $pointsAway
     */
    public function setPointsAway($pointsAway)
    {
        $this->pointsAway = $pointsAway;
    }

    /**
     * @return mixed
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     * @param mixed $tournament
     */
    public function setTournament($tournament)
    {
        $this->tournament = $tournament;
    }

    /**
     * @return mixed
     */
    public function getClubHome()
    {
        return $this->clubHome;
    }

    /**
     * @param mixed $clubHome
     */
    public function setClubHome($clubHome)
    {
        $this->clubHome = $clubHome;
    }

    /**
     * @return mixed
     */
    public function getClubAway()
    {
        return $this->clubAway;
    }

    /**
     * @param mixed $clubAway
     */
    public function setClubAway($clubAway)
    {
        $this->clubAway = $clubAway;
    }

    /**
     * @return mixed
     */
    public function getDateOfMatch()
    {
        return $this->dateOfMatch;
    }

    /**
     * @param mixed $dateOfMatch
     */
    public function setDateOfMatch($dateOfMatch)
    {
        $this->dateOfMatch = $dateOfMatch;
    }

    /**
     * @return mixed
     */
    public function getIsPlayed()
    {
        return $this->isPlayed;
    }

    /**
     * @param mixed $isPlayed
     */
    public function setIsPlayed($isPlayed)
    {
        $this->isPlayed = $isPlayed;
    }




}