<?php

namespace App\Controller;

use App\Entity\Program;
use App\Form\ProgramType;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProgramController extends AbstractController
{
    /**
     * @Route("/program", name="program", methods={"GET"})
     */
    public function index(ProgramRepository $programRepository): Response
    {
        return $this->render('front/main/program.html.twig', [
            'programs' => $programRepository->findAll(),
        ]);
    }
}