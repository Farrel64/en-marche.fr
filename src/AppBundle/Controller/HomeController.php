<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction()
    {
        $repository = $this->get('app.filesystem.article_repository');

        return $this->render('home/index.html.twig', [
            'articles' => $repository->getHomeArticles(),
            'live_links' => $repository->getHomeLiveLinks(),
        ]);
    }

    /**
     * @Route("/article/{slug}", name="article_view")
     * @Method("GET")
     */
    public function articleAction($slug)
    {
        return $this->render('home/index.html.twig', [
            'article' => $this->get('app.filesystem.article_repository')->getArticle($slug),
        ]);
    }
}
