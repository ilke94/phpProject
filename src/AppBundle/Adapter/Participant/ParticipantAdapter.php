<?php

namespace AppBundle\Adapter\Participant;

use CoreBundle\Adapter\BaseAdapter;
use CoreBundle\Adapter\BasicConverter;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Business\Manager\ParticipantManager;

class ParticipantAdapter extends BaseAdapter
{
    protected $participantManager;
    /**
     * @param ParticipantManager $participantManager
     */
    public function __construct(ParticipantManager $participantManager)
    {
        $this->participantManager = $participantManager;
    }
    /**
     * @param string  $param
     * @param Request $request
     * @return BasicConverter
     */
    public function buildConverterInstance($param, Request $request)
    {
        $type = __NAMESPACE__."\\".ucfirst($param).ParticipantAdapterUtil::BASE_CONVERTER_NAME;
        return new $type($this->participantManager, $request, $param);
    }
}