<?php

namespace App\Controller;

use App\Form\MedalFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MedalController extends AbstractController
{
    #[Route('/medal', name: 'app_medal')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $form = $this->createForm(MedalFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $medal = $form->getData();

            $entityManager->persist($medal);
            $entityManager->flush();

            $this->addFlash('success', 'Medal created!');
        }

        return $this->render('medal/index.html.twig', [
            'controller_name' => 'MedalController',
            'medalForm' => $form->createView()
        ]);
    }
}
