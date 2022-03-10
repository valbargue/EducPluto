<?php

namespace App\Controller;

use App\Entity\Prestation;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\IsTrue;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Prestation::class);
        $prestations = $repository->findBy([], ['createdAt' => 'ASC'], 3);
        return $this->render('app/index.html.twig', [
            'prestations' => $prestations
        ]);
    }

    /**
     * @Route("/blog", name="app_blog")
     */
    public function blog(): Response
    {
        return $this->render('app/blog.html.twig');
    }
    /**
     * @Route("/rdv", name="app_rdv")
     */
    public function rdv(): Response
    {
        $form = $this->createFormBuilder()
            ->add('lastname', TextType::class, ['label' => 'Nom*'])
            ->add('mail', EmailType::class, ['label' => 'Email*'])
            ->add('object', TextType::class, ['label' => 'Object*'])
            ->add('message', TextareaType::class, ['label' => 'Message*'])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'I know, it\'s silly, but you must agree to our terms.'
                    ])
                ]
            ])
            ->add('send', SubmitType::class, ['label' => 'Envoyer'])
            ->getForm();
        return $this->render('app/rdv.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
