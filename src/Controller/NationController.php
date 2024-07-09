<?php

namespace App\Controller;

use App\Entity\Nation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NationController extends AbstractController
{
    #[Route('/nation/{nation}', name: 'app_nation')]
    public function index(
        Nation $nation
    ): Response
    {
        return $this->render('nation/index.html.twig', [
            'controller_name' => 'NationController',
        ]);
    }
}
