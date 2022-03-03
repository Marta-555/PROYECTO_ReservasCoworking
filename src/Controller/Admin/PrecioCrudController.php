<?php

namespace App\Controller\Admin;

use App\Entity\Precio;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PrecioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Precio::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('categoria'),
            AssociationField::new('tarifa'),
            MoneyField::new('cantidad')->setCurrency('EUR')->setColumns(3)
        ];
    }

}
