<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name');

        yield DateTimeField::new('createdAt')
            ->setRequired(false)
            ->setTimezone('Europe/Paris')->onlyOnIndex();
        yield DateTimeField::new('updatedAt')
            ->setRequired(false)
            ->setTimezone('Europe/Paris')->onlyOnIndex();
    }
}
