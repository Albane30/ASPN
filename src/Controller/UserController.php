<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Team;
use App\Repository\UserRepository;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
   
    /**
     * @Route("user/referee", name="referees_index", methods={"GET"})
     */
    public function findRef(UserRepository $userRepository): Response
    {   
        $referees = $userRepository->findReferee();
        return $this->render('front/main/referees.html.twig', [
            'users' => $referees,
        ]);
    }

     /**
     * @Route("user/leadership", name="leadership_index", methods={"GET"})
     */
    public function findLead(UserRepository $userRepository): Response
    {   
        $leaderships = $userRepository->findLeadership();
        return $this->render('front/main/leaderships.html.twig', [
            'users' => $leaderships,
        ]);
    }

    /**
     * @Route("user/coach", name="coach_index", methods={"GET"})
     */
    public function findCoach(UserRepository $userRepository): Response
    {   
        $coachs = $userRepository->findCoach();
        return $this->render('front/main/coachs.html.twig', [
            'users' => $coachs,
        ]);
    }

    /**
     * @Route("user/seniors1", name="seniors1_index", methods={"GET"})
     */
    public function findSeniors1(UserRepository $userRepository): Response
    {   
        $seniors1 = $userRepository->findPlayerBySeniors1();
        return $this->render('front/main/seniors1.html.twig', [
            'users' => $seniors1,
        ]);
    }

    /**
     * @Route("user/seniors2", name="seniors2_index", methods={"GET"})
     */
    public function findSeniors2(UserRepository $userRepository): Response
    {   
        $seniors2 = $userRepository->findPlayerBySeniors2();
        return $this->render('front/main/seniors2.html.twig', [
            'users' => $seniors2,
        ]);
    }

     /**
     * @Route("user/feminines", name="feminines_index", methods={"GET"})
     */
    public function findFeminines(UserRepository $userRepository): Response
    {   
        $feminines = $userRepository->findPlayerByFeminines();
        return $this->render('front/main/feminines.html.twig', [
            'users' => $feminines,
        ]);
    }

     /**
     * @Route("user/loisirs", name="loisirs_index", methods={"GET"})
     */
    public function findLoisirs(UserRepository $userRepository): Response
    {   
        $loisirs = $userRepository->findPlayerByLoisirs();
        return $this->render('front/main/loisirs.html.twig', [
            'users' => $loisirs,
        ]);
    }
    
}
