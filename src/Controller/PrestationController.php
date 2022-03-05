<?php

namespace App\Controller;

use App\Entity\Prestation;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prestation")
 */

class PrestationController extends AbstractController
{
    /**
     * @Route("/", name="app_prestation")
     */
    public function index(ManagerRegistry $doctrine): Response {
        $repository = $doctrine->getRepository(Prestation::class);
        $prestations = $repository->findAll();
        return $this->render('prestation/index.html.twig', [
            'prestations' =>$prestations
        ]);
    }
}
