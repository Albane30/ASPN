<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Team;
use App\Form\PlayerType;
use App\Form\CoachType;
use App\Form\LeadershipType;
use App\Form\RefereeType;
use App\Repository\UserRepository;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/user", name="admin_U_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/referee", name="referees_index", methods={"GET"})
     */
    public function findRef(UserRepository $userRepository): Response
    {   
        $referees = $userRepository->findReferee();
        return $this->render('front/main/referees.html.twig', [
            'users' => $referees,
        ]);
    }

    /**
     * @Route("/player", name="player_new", methods={"GET","POST"})
     */
    public function newPlayer(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(PlayerType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user->setIsPlayer(true);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('admin_U_user_index');
        }

        return $this->render('admin/user/newPlayer.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/coach", name="coach_new", methods={"GET","POST"})
     */
    public function newCoach(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(CoachType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user->setIsCoach(true);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('admin_U_user_index');
        }

        return $this->render('admin/user/newCoach.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/bureau", name="leadership_new", methods={"GET","POST"})
     */
    public function newLeadership(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(LeadershipType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user->setIsLeadership(true);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('admin_U_user_index');
        }

        return $this->render('admin/user/newLeadership.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/arbitre", name="referee_new", methods={"GET","POST"})
     */
    public function newReferee(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(RefereeType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user->setIsReferee(true);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('admin_U_user_index');
        }

        return $this->render('admin/user/newReferee.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('admin/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_U_user_index');
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_U_user_index');
    }
}
