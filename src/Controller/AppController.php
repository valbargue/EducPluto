<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends AbstractController {
    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response {
        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("/prestation", name="app_prestation")
     */
    public function prestation(): Response {
        return $this->render('app/prestation.html.twig');
    }
    /**
     * @Route("/blog", name="app_blog")
     */
    public function blog(): Response {
        return $this->render('app/blog.html.twig');
    }
    /**
     * @Route("/rdv", name="app_rdv")
     */
    public function rdv(): Response {
        return $this->render('app/rdv.html.twig');
    }

}
