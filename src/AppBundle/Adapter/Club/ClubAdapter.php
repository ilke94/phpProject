<?php

namespace AppBundle\Adapter\Club;

use CoreBundle\Adapter\BaseAdapter;
use CoreBundle\Adapter\BasicConverter;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Business\Manager\ClubManager;

class ClubAdapter extends BaseAdapter
{
    protected $clubManager;
    /**
     * @param ClubManager $clubManager
     */
    public function __construct(ClubManager $clubManager)
    {
        $this->clubManager = $clubManager;
    }
    /**
     * @param string  $param
     * @param Request $request
     * @return BasicConverter
     */
    public function buildConverterInstance($param, Request $request)
    {
        $type = __NAMESPACE__."\\".ucfirst($param).\ClubAdapterUtil::BASE_CONVERTER_NAME;
        return new $type($this->clubManager, $request, $param);
    }
}