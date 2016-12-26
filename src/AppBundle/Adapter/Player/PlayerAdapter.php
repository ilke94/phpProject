<?php

namespace AppBundle\Adapter\Player;

use CoreBundle\Adapter\BaseAdapter;
use CoreBundle\Adapter\BasicConverter;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Business\Manager\PlayerManager;

class PlayerAdapter extends BaseAdapter
{
    /**
     * @param PlayerManager $playerManager
     */
    public function __construct(PlayerManager $playerManager)
    {
        $this->playerManager = $playerManager;
    }
    /**
     * @param string  $param
     * @param Request $request
     * @return BasicConverter
     */
    public function buildConverterInstance($param, Request $request)
    {
        $type = __NAMESPACE__."\\".ucfirst($param).PlayerAdapterUtil::BASE_CONVERTER_NAME;
        return new $type($this->playerManager, $request, $param);
    }
}