<?php

namespace AppBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    /**
     * @Route("/api/players/{id}", name="api_players", options={"expose" = true}, defaults={"id": "all"}),
     * @param ArrayCollection $playerAPI
     * @return Response
     */
    public function playerAPIAction(ArrayCollection $playerAPI)
    {
        return new JsonResponse($playerAPI->toArray(), 200);
    }
}
