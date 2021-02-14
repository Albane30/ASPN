<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Team;
use App\Repository\TeamRepository;
use App\Entity\Convocation;
use App\Repository\ConvocationRepository;



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

    // /**
    //  * @Route("/convocation/{id}", name="convoc_show", methods={"GET"})
    //  */
    // public function showConvoc(TeamRepository $teamRepository, Team $team): Response
    // {
    //     $teamConvoc = $teamRepository->findConvocByTeam();
    //     return $this->render('front/main/convoc/show.html.twig', [
    //         'convocation' => $teamConvoc,
    //     ]);
    // }
}
