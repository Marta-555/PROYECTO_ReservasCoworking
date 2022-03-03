<?php

namespace App\Controller\Admin;

use App\Entity\Recurso;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class RecursoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recurso::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nombre'),
            AssociationField::new('categoria')->setColumns(5)
        ];
    }

}
