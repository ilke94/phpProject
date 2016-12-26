<?php

namespace AppBundle\Business\Manager;

use AppBundle\Business\Repository\TournamentRepository;
use AppBundle\Entity\Tournament;
use CoreBundle\Adapter\AgentApiResponse;
use FSerializerBundle\services\FJsonApiSerializer;
use CoreBundle\Business\Manager\JSONAPIEntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;


class TournamentManager implements  JSONAPIEntityManagerInterface
{
    /**
     * @var TournamentRepository
     */
    protected $repository;

    /**
     * @var FJsonApiSerializer
     */
    protected $fSerializer;

    /**
     * @param TournamentRepository $repository
     * @param FJsonApiSerializer $fSerializer
     */
    public function __construct(TournamentRepository $repository, FJsonApiSerializer $fSerializer)
    {
        $this->repository = $repository;
        $this->fSerializer = $fSerializer;
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function getResource($id = null)
    {
        return $this->serializeTournament($this->repository->findTournament($id));
    }

    /**
     * @param $data
     * @return mixed
     */
    public function updateResource($data)
    {
        // TODO: Implement updateResource() method.
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function deleteResource($id)
    {
        // TODO: Implement deleteResource() method.
    }

    /**
     * @param $data
     * @return mixed
     */
    public function saveResource($data)
    {
        // TODO: Implement saveResource() method.
    }

    /**
     * @param $content
     * @param null $mappings
     * @return mixed
     */
    public function deserializeTournament($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'tournament'  => array('class' => Tournament::class, 'type'=>'tournaments')
            );
        }
        return $this->fSerializer->setDeserializationClass(Tournament::class)->deserialize($content, $mappings, $relations);
    }
    /**
     * @param $content
     * @param null $mappings
     * @return mixed
     */
    public function serializeTournament($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'tournament'  => array('class' => Tournament::class, 'type'=>'tournaments')
            );
        }
        return $this->fSerializer->serialize($content, $mappings, $relations)->toArray();
    }
}