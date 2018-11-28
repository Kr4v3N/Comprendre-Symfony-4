<?php

namespace App\Controller;

use App\Entity\Article;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/", name="home")
     *
     */

    public function home(){
        return $this->render('blog/home.html.twig',[
            'title' => "Bienvenue les amis",
            'age' => 47
        ]);
    }

    /**
     * @Route("blog/new", name="blog_create")
     */
    public function create(){

        return $this->render('blog/create.html.twig');
    }


    /**
     * @Route("/blog/{id}", name="blog_show")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show ($id) {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $article = $repo->find($id);

        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);

    }

}
