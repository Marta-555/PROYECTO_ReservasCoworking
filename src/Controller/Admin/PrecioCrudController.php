<?php

namespace App\Controller\Admin;

use App\Entity\Precio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PrecioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Precio::class;
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
