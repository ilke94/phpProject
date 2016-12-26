<?php

namespace AppBundle\Business\Manager;

use AppBundle\Business\Repository\ParticipantRepository;
use AppBundle\Entity\Participant;
use CoreBundle\Adapter\AgentApiResponse;
use FSerializerBundle\services\FJsonApiSerializer;
use CoreBundle\Business\Manager\JSONAPIEntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;


class ParticipantManager implements JSONAPIEntityManagerInterface
{
    /**
     * @var ParticipantRepository
     */
    protected $repository;

    /**
     * @var FJsonApiSerializer
     */
    protected $fSerializer;

    /**
     * @param ParticipantRepository $repository
     * @param FJsonApiSerializer $fSerializer
     */
    public function __construct(ParticipantRepository $repository, FJsonApiSerializer $fSerializer)
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
        return $this->serializeParticipant($this->repository->findParticipant($id));
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
    public function deserializeParticipant($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'participant'  => array('class' => Participant::class, 'type'=>'participants')
            );
        }
        return $this->fSerializer->setDeserializationClass(Participant::class)->deserialize($content, $mappings, $relations);
    }
    /**
     * @param $content
     * @param null $mappings
     * @return mixed
     */
    public function serializeParticipant($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'participants'  => array('class' => Participant::class, 'type'=>'participants')
            );
        }
        return $this->fSerializer->serialize($content, $mappings, $relations)->toArray();
    }
}