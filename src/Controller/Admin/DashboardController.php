<?php

namespace App\Controller\Admin;

use App\Entity\Categoria;
use App\Entity\Extras;
use App\Entity\Precio;
use App\Entity\Recurso;
use App\Entity\Reserva;
use App\Entity\Tarifa;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {


        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ReservaCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        //return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PROYECTO ReservasCoworking');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToDashboard('LaFabrikilla Coworking', 'fa fa-home');

        yield MenuItem::subMenu('Reservas', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Añadir reserva', 'fas fa-plus', Reserva::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Mostrar reservas', 'fas fa-eye', Reserva::class)
        ]);

        yield MenuItem::subMenu('Recursos', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Añadir recurso', 'fas fa-plus', Recurso::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Mostrar recursos', 'fas fa-eye', Recurso::class)
        ]);

        yield MenuItem::subMenu('Categorias', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Añadir categoría', 'fas fa-plus', Categoria::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Mostrar categorías', 'fas fa-eye', Categoria::class)
        ]);

        yield MenuItem::subMenu('Extras', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Añadir extra', 'fas fa-plus', Extras::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Mostrar extras', 'fas fa-eye', Extras::class)
        ]);

        yield MenuItem::subMenu('Tarifas', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Añadir tarifa', 'fas fa-plus', Tarifa::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Mostrar tarifas', 'fas fa-eye', Tarifa::class),
        ]);

        yield MenuItem::subMenu('Precios', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Añadir precio', 'fas fa-plus', Precio::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Mostrar precios', 'fas fa-eye', Precio::class),
        ]);


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
