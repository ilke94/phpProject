<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="AppBundle\Business\Repository\TournamentRepository")
 * @Doctrine\ORM\Mapping\Table(name="tournament")
 */
class Tournament
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var integer
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FootballMatch", mappedBy="tournament")
     */
    private $footballMatchs;

    /**
     * Tournament constructor.
     */
    public function __construct()
    {
        $this->footballMatchs = [];
    }


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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getFootballMatchs()
    {
        return $this->footballMatchs;
    }

    /**
     * @param mixed $footballMatch
     */
    public function addFootballMatch($footballMatch)
    {
        $this->footballMatchs[] = $footballMatch;
    }


}