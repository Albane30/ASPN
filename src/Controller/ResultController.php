<?php

namespace App\Controller;

use App\Entity\Result;
use App\Form\ResultType;
use App\Repository\ResultRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ResultController extends AbstractController
{
    /**
     * @Route("/result", name="result")
     */
    public function index(ResultRepository $resultRepository): Response
    {
        return $this->render('front/main/result.html.twig', [
            'results' => $resultRepository->findAll(),
        ]);
    }
}