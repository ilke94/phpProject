<?php

namespace AppBundle\Business\Manager;


use AppBundle\Business\Repository\PlayerRepository;
use AppBundle\Entity\Player;
use CoreBundle\Adapter\AgentApiResponse;
use FSerializerBundle\services\FJsonApiSerializer;
use CoreBundle\Business\Manager\JSONAPIEntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class PlayerManager implements JSONAPIEntityManagerInterface
{
    /**
     * @var PlayerRepository
     */
    protected $repository;

    /**
     * @var FJsonApiSerializer
     */
    protected $fSerializer;

    /**
     * @param PlayerRepository $repository
     * @param FJsonApiSerializer $fSerializer
     */
    public function __construct(PlayerRepository $repository, FJsonApiSerializer $fSerializer)
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
        //logic
        /**
         * TO DO
         * 
         */
       return $this->serializePlayer($this->repository->findPlayer($id));
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
    public function deserializePlayer($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'player'  => array('class' => Player::class, 'type'=>'players')
            );
        }
        return $this->fSerializer->setDeserializationClass(Player::class)->deserialize($content, $mappings, $relations);
    }
    /**
     * @param $content
     * @param null $mappings
     * @return mixed
     */
    public function serializePlayer($content, $mappings = null)
    {
        $relations = array();
        if (!$mappings) {
            $mappings = array(
                'player'  => array('class' => Player::class, 'type'=>'players')
            );
        }
        return $this->fSerializer->serialize($content, $mappings, $relations)->toArray();
    }
}