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

class PrestationController extends AbstractController {
    /**
     * @Route("/", name="prestation_index")
     */
    public function index(ManagerRegistry $doctrine): Response {
        $repository = $doctrine->getRepository(Prestation::class);
        $prestations = $repository->findAll();
        return $this->render('prestation/index.html.twig', [
            'prestations' => $prestations
        ]);
    }
    /**
     * @Route("/{id}", name="prestation_show", requirements={ "id" = "\d+"})
     */
    public function show($id, ManagerRegistry $doctrine): Response {
        $repository = $doctrine->getRepository(Prestation::class);
        $prestation = $repository->find($id);
        return $this->render('prestation/show.html.twig', [
            'prestation' => $prestation
        ]);
    }
}
