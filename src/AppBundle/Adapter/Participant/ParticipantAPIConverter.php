<?php

namespace AppBundle\Adapter\Participant;

use CoreBundle\Adapter\JsonAPIConverter;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Business\Manager\ParticipantManager;

class ParticipantAPIConverter extends JsonAPIConverter
{
    /**
     * @param ParticipantManager $manager
     * @param Request      $request
     * @param string       $param
     */
    public function __construct(ParticipantManager $manager, Request $request, $param)
    {
        parent::__construct($manager, $request, $param);
    }

    /**
     * @inheritdoc
     */
    public function convert()
    {
        $this->request->attributes->set($this->param, new ArrayCollection(parent::convert()));
    }
}