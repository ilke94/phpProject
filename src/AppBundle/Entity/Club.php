<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="AppBundle\Business\Repository\PlayerRepository")
 * @Doctrine\ORM\Mapping\Table(name="club")
 */
class Club
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var integer
     * @ORM\Column(name="year_of_establishment", type="integer")
     */
    private $yearOfEstablishment;

    /**
     * @var string
     * @ORM\Column(name="from", type="string", length=50)
     */
    private $from;

    /**
     * @var integer
     * @ORM\Column(name="stadium_capacity", type="integer")
     */
    private $stadiumCapacity;

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
    public function getYearOfEstablishment()
    {
        return $this->yearOfEstablishment;
    }

    /**
     * @param int $yearOfEstablishment
     */
    public function setYearOfEstablishment($yearOfEstablishment)
    {
        $this->yearOfEstablishment = $yearOfEstablishment;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getStadiumCapacity()
    {
        return $this->stadiumCapacity;
    }

    /**
     * @param int $stadiumCapacity
     */
    public function setStadiumCapacity($stadiumCapacity)
    {
        $this->stadiumCapacity = $stadiumCapacity;
    }


}