<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Team;


/**
 * @Route("/team", name="front_T_")
 */
class TeamController extends AbstractController
{   
   

    /**
     * @Route("/{id}", name="team_show", methods={"GET"})
     */
    public function show(Team $team): Response
    {
        return $this->render('front/main/team/show.html.twig', [
            'team' => $team,
        ]);
    }
}
