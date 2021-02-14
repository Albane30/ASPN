<?php

namespace App\Controller;

use App\Entity\Convocation;
use App\Form\ConvocationType;
use App\Repository\ConvocationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class ConvocationController extends AbstractController
{
    /**
     * @Route("/convocation/seniors1", name="convocation_seniors1_index", methods={"GET"})
     */
    public function findConvocSeniors1(ConvocationRepository $convocationRepository): Response
    {   
        $seniors1 = $convocationRepository->findConvocBySeniors1();
        return $this->render('front/main/convocSeniors1.html.twig', [
            'convocations' => $seniors1,
        ]);
    }

    /**
     * @Route("/convocation/seniors2", name="convocation_seniors2_index", methods={"GET"})
     */
    public function findConvocSeniors2(ConvocationRepository $convocationRepository): Response
    {   
        $seniors2 = $convocationRepository->findConvocBySeniors2();
        return $this->render('front/main/convocSeniors2.html.twig', [
            'convocations' => $seniors2,
        ]);
    }

    /**
     * @Route("/convocation/feminines", name="convocation_feminines_index", methods={"GET"})
     */
    public function findConvocFeminines(ConvocationRepository $convocationRepository): Response
    {   
        $feminines = $convocationRepository->findConvocByFeminines();
        return $this->render('front/main/convocFeminines.html.twig', [
            'convocations' => $feminines,
        ]);
    }

    /**
     * @Route("/convocation/loisirs", name="convocation_loisirs_index", methods={"GET"})
     */
    public function findConvocLoisirs(ConvocationRepository $convocationRepository): Response
    {   
        $loisirs = $convocationRepository->findConvocByLoisirs();
        return $this->render('front/main/convocLoisirs.html.twig', [
            'convocations' => $loisirs,
        ]);
    }

    //  /**
    //  * @Route("/convocation/{id}", name="convoc_show", methods={"GET"})
    //  */
    // public function show(ConvocationRepository $convocationRepository): Response
    // {
    //     $teamConvoc = $convocationRepository->findConvocByTeam();
    //     return $this->render('front/main/convoc/show.html.twig', [
    //         'convocation' => $teamConvoc,
    //     ]);
    // }
}
