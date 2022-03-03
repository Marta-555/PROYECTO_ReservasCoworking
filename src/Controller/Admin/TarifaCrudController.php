<?php

namespace App\Controller\Admin;

use App\Entity\Tarifa;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TarifaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tarifa::class;
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
