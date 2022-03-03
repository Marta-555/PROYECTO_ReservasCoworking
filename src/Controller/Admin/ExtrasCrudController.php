<?php

namespace App\Controller\Admin;

use App\Entity\Extras;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExtrasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Extras::class;
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
