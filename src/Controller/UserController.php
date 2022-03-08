<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\RegisterType;
use App\Form\EditUserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    private $sesion;

    function __construct()
    {
        $this->sesion = new Session();
    }

    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        if (is_object($this->getUser())) {
            return $this->redirectToRoute('home');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', [
            'titulo' => 'Login',
            'error' => $error,
            'last_username' => $lastUserName,
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout(){}


    #[Route('/cuenta', name: 'cuenta')]
    public function editUser(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditUserType::class, $user);

        return $this->render('user/editUser.html.twig', [
            'titulo' => 'Cuenta', 'form'=> $form->createView()
        ]);
    }



    #[Route('/register', name: 'register')]
    public function register(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher)
    {

        if (is_object($this->getUser())) {
            return $this->redirectToRoute('home');
        }

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(['ROLE_USER']);
            $hashedPassword  = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword );

            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $flush = $entityManager->flush();

            if ($flush == null) {
                $msg = 'Usuario registrado con éxito.';

                $this->sesion->getFlashBag()->add('msg', $msg);
                return $this->redirectToRoute('login');

            } else {
                $msg = 'El registro ha fallado, vuelva a intentarlo.';
            }

        }

        return $this->render('user/register.html.twig', [
            'titulo' => 'Registro', 'form'=> $form->createView()
        ]);
    }
}
