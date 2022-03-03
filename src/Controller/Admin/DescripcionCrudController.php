<?php

namespace App\Controller\Admin;

use App\Entity\Descripcion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DescripcionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Descripcion::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
