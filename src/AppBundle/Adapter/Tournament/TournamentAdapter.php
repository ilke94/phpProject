<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 25.12.2016.
 * Time: 17.13
 */

namespace AppBundle\Adapter\Tournament;

use CoreBundle\Adapter\BaseAdapter;
use CoreBundle\Adapter\BasicConverter;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Business\Manager\TournamentManager;

class TournamentAdapter extends BaseAdapter
{
    protected $tournamentManager;
    /**
     * @param TournamentManager $tournamentManager
     */
    public function __construct(TournamentManager $tournamentManager)
    {
        $this->tournamentManager = $tournamentManager;
    }
    /**
     * @param string  $param
     * @param Request $request
     * @return BasicConverter
     */
    public function buildConverterInstance($param, Request $request)
    {
        $type = __NAMESPACE__."\\".ucfirst($param).TournamentAdapterUtil::BASE_CONVERTER_NAME;
        return new $type($this->tournamentManager, $request, $param);
    }
}