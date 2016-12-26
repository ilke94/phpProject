<?php

namespace AppBundle\Adapter\Player;

use CoreBundle\Adapter\JsonAPIConverter;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Business\Manager\PlayerManager;

class PlayerAPIConverter extends JsonAPIConverter
{
    /**
     * @param PlayerManager $manager
     * @param Request      $request
     * @param string       $param
     */
    public function __construct(PlayerManager $manager, Request $request, $param)
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