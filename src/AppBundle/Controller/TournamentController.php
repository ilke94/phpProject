<?php

namespace AppBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TournamentController extends Controller
{
    /**
     * @Route("/api/tournaments/{id}", name="api_tournaments", options={"expose" = true}, defaults={"id": "all"}),
     * @param ArrayCollection $tournamentAPI
     * @return Response
     */
    public function playerAPIAction(ArrayCollection $tournamentAPI)
    {

        return new JsonResponse($tournamentAPI->toArray(), 200);
    }
}
