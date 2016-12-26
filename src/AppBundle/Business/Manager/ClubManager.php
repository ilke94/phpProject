<?php

namespace AppBundle\Business\Manager;

use AppBundle\Business\Repository\ClubRepository;
use AppBundle\Entity\Club;
use CoreBundle\Adapter\AgentApiResponse;
use FSerializerBundle\services\FJsonApiSerializer;
use CoreBundle\Business\Manager\JSONAPIEntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;


class ClubManager implements JSONAPIEntityManagerInterface
{
    /**
     * @var ClubRepository
     */
    protected $repository;

    /**
     * @var FJsonApiSerializer
     */
    protected $fSerializer;

    /**
     * @param ClubRepository $repository
     * @param FJsonApiSerializer $fSerializer
     */
    public function __construct(ClubRepository $repository, FJsonApiSerializer $fSerializer)
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
        return $this->serializeClub($this->repository->findClub($id));
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
    public function deserializeClub($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'club'  => array('class' => Club::class, 'type'=>'clubs')
            );
        }
        return $this->fSerializer->setDeserializationClass(Club::class)->deserialize($content, $mappings, $relations);
    }
    /**
     * @param $content
     * @param null $mappings
     * @return mixed
     */
    public function serializeClub($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'club'  => array('class' => Club::class, 'type'=>'clubs')
            );
        }
        return $this->fSerializer->serialize($content, $mappings, $relations)->toArray();
    }
}