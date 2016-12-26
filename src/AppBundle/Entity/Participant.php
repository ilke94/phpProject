<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 25.12.2016.
 * Time: 16.44
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="participant")
 */
class Participant
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Club")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     */
    private $club;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tournament")
     * @ORM\JoinColumn(name="tournament_id", referencedColumnName="id")
     */
    private $tournament;


    /**
     * @var integer
     * @ORM\Column(name="place", type="integer")
     */
    private $place;

    /**
     * @var integer
     * @ORM\Column(name="goal", type="integer")
     */
    private $goal;

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
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
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
     * @return int
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param int $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return int
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param int $goal
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
    }


}