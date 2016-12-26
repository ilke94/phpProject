<?php

namespace AppBundle\Business\Manager;

use AppBundle\Business\Repository\FootballMatchRepository;
use AppBundle\Entity\Club;
use AppBundle\Entity\FootballMatch;
use CoreBundle\Adapter\AgentApiResponse;
use FSerializerBundle\services\FJsonApiSerializer;
use CoreBundle\Business\Manager\JSONAPIEntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;


class FootballMatchManager implements JSONAPIEntityManagerInterface
{
    /**
     * @var FootballMatchRepository
     */
    protected $repository;

    /**
     * @var FJsonApiSerializer
     */
    protected $fSerializer;

    /**
     * @param FootballMatchRepository $repository
     * @param FJsonApiSerializer $fSerializer
     */
    public function __construct(FootballMatchRepository $repository, FJsonApiSerializer $fSerializer)
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
        return $this->serializeFootballMatch($this->repository->findFootballMatch($id));
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
    public function deserializeFootballMatch($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'match'  => array('class' => FootballMatch::class, 'type'=>'matches')
            );
        }
        return $this->fSerializer->setDeserializationClass(FootballMatch::class)->deserialize($content, $mappings, $relations);
    }
    /**
     * @param $content
     * @param null $mappings
     * @return mixed
     */
    public function serializeFootballMatch($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'match'  => array('class' => FootballMatch::class, 'type'=>'matches')
            );
        }
        return $this->fSerializer->serialize($content, $mappings, $relations)->toArray();
    }
}