<?php

namespace App\Controller\Admin;

use App\Entity\Convocation;
use App\Form\ConvocationType;
use App\Repository\ConvocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/convocation", name="admin_C_" )
 */
class ConvocationController extends AbstractController
{
    /**
     * @Route("/", name="convocation_index", methods={"GET"})
     */
    public function index(ConvocationRepository $convocationRepository): Response
    {
        return $this->render('admin/convocation/index.html.twig', [
            'convocations' => $convocationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="convocation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $convocation = new Convocation();
        $form = $this->createForm(ConvocationType::class, $convocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($convocation);
            $entityManager->flush();

            return $this->redirectToRoute('admin_C_convocation_index');
        }

        return $this->render('admin/convocation/new.html.twig', [
            'convocation' => $convocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="convocation_show", methods={"GET"})
     */
    public function show(Convocation $convocation): Response
    {
        return $this->render('admin/convocation/show.html.twig', [
            'convocation' => $convocation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="convocation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Convocation $convocation): Response
    {
        $form = $this->createForm(ConvocationType::class, $convocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_C_convocation_index');
        }

        return $this->render('admin/convocation/edit.html.twig', [
            'convocation' => $convocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="convocation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Convocation $convocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$convocation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($convocation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_C_convocation_index');
    }
}
