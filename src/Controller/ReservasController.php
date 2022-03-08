<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservasController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(): Response
    {
        return $this->render('reservas/index.html.twig', [
            'titulo' => 'Reservas',
        ]);
    }
}
