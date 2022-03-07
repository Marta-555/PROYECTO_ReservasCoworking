<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\Persistence\ManagerRegistry;
use
Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('user/login.html.twig', [
            'titulo' => 'Login',
        ]);
    }

    #[Route('/register', name: 'register')]
    public function register(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(['ROLE_USER']);
            $hashedPassword  = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword );

            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('user/register.html.twig', [
            'titulo' => 'Registro', 'form'=> $form->createView()
        ]);
    }
}
