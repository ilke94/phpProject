<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 25.12.2016.
 * Time: 17.16
 */

namespace AppBundle\Adapter\Tournament;

use AppBundle\Business\Manager\TournamentManager;
use CoreBundle\Adapter\JsonAPIConverter;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

class TournamentAPIConverter extends JsonAPIConverter
{
    /**
     * @param TournamentManager $manager
     * @param Request      $request
     * @param string       $param
     */
    public function __construct(TournamentManager $manager, Request $request, $param)
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