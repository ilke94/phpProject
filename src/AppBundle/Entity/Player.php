<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player
 * @package AppBundle\Entity
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="AppBundle\Business\Repository\PlayerRepository")
 * @Doctrine\ORM\Mapping\Table(name="player")
 */
class Player
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
     * @var string
     * @ORM\Column(name="last_name", type="string", length=30)
     */
    private $lastName;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_of_birth", type="date")
     */
    private $dateOfBirth;

    /**
     * @var string
     * @ORM\Column(name="position", type="string", length=30)
     */
    private $position;

    /**
     * @var string
     * @ORM\Column(name="nationality", type="string", length=50)
     */
    private $nationality;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Club")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     */
    private $club;

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
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
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




}