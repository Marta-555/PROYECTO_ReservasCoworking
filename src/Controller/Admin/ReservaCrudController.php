<?php

namespace App\Controller\Admin;

use App\Entity\Reserva;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class ReservaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reserva::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('recurso'),
            DateTimeField::new('fechaInicio'),
            DateTimeField::new('fechaFin'),
            MoneyField::new('precioTotal')->setCurrency('EUR')->setColumns(2),
            BooleanField::new('pago')
        ];
    }

}
