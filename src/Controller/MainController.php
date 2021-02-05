<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(Request $request): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $listArticles = $repo->findAll();
        return $this->render('front/main/home.html.twig', [
            'articles' => $listArticles
        ]);
    }

    /**
     * @Route("show/{id}", name="showInHome", methods={"GET"})
     */
    public function show(Article $article): Response
    {   
        return $this->render('front/main/show.html.twig', [
            'article' => $article,
        ]);
    }
}
